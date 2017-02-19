
#include <iostream>
#include <vector>

#include "Schedule.h"
using namespace std;


// Initializes chromosomes with configuration block (setup of chromosome)
Schedule::Schedule(int numberOfCrossoverPoints, int mutationSize,
                   int crossoverProbability, int mutationProbability) : _mutationSize(mutationSize),
_numberOfCrossoverPoints(numberOfCrossoverPoints),
_crossoverProbability(crossoverProbability),
_mutationProbability(mutationProbability),
_fitness(0)
{
    // reserve space for time-space slots in chromosomes code
    _slots.resize( DAYS_NUM * DAY_HOURS * Configuration::GetInstance().GetNumberOfRooms() );

    // reserve space for flags of class requirements
    _criteria.resize( Configuration::GetInstance().GetNumberOfCourseClasses() * 5 );
}

// Copy constructor
Schedule::Schedule(const Schedule& c, bool setupOnly)
{
    if( !setupOnly )
    {
        // copy code
        _slots = c._slots;
        _classes = c._classes;

        // copy flags of class requirements
        _criteria = c._criteria;

        // copy fitness
        _fitness = c._fitness;
    }
    else
    {
        // reserve space for time-space slots in chromosomes code
        _slots.resize( DAYS_NUM * DAY_HOURS * Configuration::GetInstance().GetNumberOfRooms() );

        // reserve space for flags of class requirements
        _criteria.resize( Configuration::GetInstance().GetNumberOfCourseClasses() * 5 );
    }

    // copy parameters
    _numberOfCrossoverPoints = c._numberOfCrossoverPoints;
    _mutationSize = c._mutationSize;
    _crossoverProbability = c._crossoverProbability;
    _mutationProbability = c._mutationProbability;
}

// Makes copy ot chromosome
Schedule* Schedule::MakeCopy(bool setupOnly) const
{
    // make object by calling copy constructor and return smart pointer to new object
    return new Schedule( *this, setupOnly );
}

// Makes new chromosome with same setup but with randomly chosen code
Schedule* Schedule::MakeNewFromPrototype() const
{
    // number of time-space slots
    int size = (int)_slots.size();

    // make new chromosome, copy chromosome setup
    Schedule* newChromosome = new Schedule( *this, true );

    // place classes at random position
    const list<CourseClass*>& c = Configuration::GetInstance().GetCourseClasses();
    for( list<CourseClass*>::const_iterator it = c.begin(); it != c.end(); it++ )
    {
        // determine random position of class
        int nr = Configuration::GetInstance().GetNumberOfRooms();
        int dur = ( *it )->GetDuration();
        int day = rand() % DAYS_NUM;
        int room = rand() % nr;
        int time = rand() % ( DAY_HOURS + 1 - dur );
        int pos = day * nr * DAY_HOURS + room * DAY_HOURS + time;

        // fill time-space slots, for each hour of class
        for( int i = dur - 1; i >= 0; i-- )
            newChromosome->_slots.at( pos + i ).push_back( *it );

        // insert in class table of chromosome
        newChromosome->_classes.insert( pair<CourseClass*, int>( *it, pos ) );
    }

    newChromosome->CalculateFitness();

    // return smart pointer
    return newChromosome;
}

// Performes crossover operation using to chromosomes and returns pointer to offspring
Schedule* Schedule::Crossover(const Schedule& parent2) const
{
    // check probability of crossover operation
    if( rand() % 100 > _crossoverProbability )
        // no crossover, just copy first parent
        return new Schedule( *this, false );

    // new chromosome object, copy chromosome setup
    Schedule* n = new Schedule( *this, true );

    // number of classes
    int size = (int)_classes.size();

    vector<bool> cp( size );

    // determine crossover point (randomly)
    for( int i = _numberOfCrossoverPoints; i > 0; i-- )
    {
        while( 1 )
        {
            int p = rand() % size;
            if( !cp[ p ] )
            {
                cp[ p ] = true;
                break;
            }
        }
    }

    map<CourseClass*, int>::const_iterator it1 = _classes.begin();
    map<CourseClass*, int>::const_iterator it2 = parent2._classes.begin();

    // make new code by combining parent codes
    bool first = rand() % 2 == 0;
    for( int i = 0; i < size; i++ )
    {
        if( first )
        {
            // insert class from first parent into new chromosome's calss table
            n->_classes.insert( pair<CourseClass*, int>( ( *it1 ).first, ( *it1 ).second ) );
            // all time-space slots of class are copied
            for( int i = ( *it1 ).first->GetDuration() - 1; i >= 0; i-- )
                n->_slots[ ( *it1 ).second + i ].push_back( ( *it1 ).first );
        }
        else
        {
            // insert class from second parent into new chromosome's calss table
            n->_classes.insert( pair<CourseClass*, int>( ( *it2 ).first, ( *it2 ).second ) );
            // all time-space slots of class are copied
            for( int i = ( *it2 ).first->GetDuration() - 1; i >= 0; i-- )
                n->_slots[ ( *it2 ).second + i ].push_back( ( *it2 ).first );
        }

        // crossover point
        if( cp[ i ] )
            // change soruce chromosome
            first = !first;

        it1++;
        it2++;
    }

    n->CalculateFitness();

    // return smart pointer to offspring
    return n;
}

// Performs mutation on chromosome
void Schedule::Mutation()
{
    // check probability of mutation operation
    if( rand() % 100 > _mutationProbability )
        return;

    // number of classes
    int numberOfClasses = (int)_classes.size();
    // number of time-space slots
    int size = (int)_slots.size();

    // move selected number of classes at random position
    for( int i = _mutationSize; i > 0; i-- )
    {
        // select ranom chromosome for movement
        int mpos = rand() % numberOfClasses;
        int pos1 = 0;
        map<CourseClass*, int>::iterator it = _classes.begin();
        for( ; mpos > 0; it++, mpos-- )
            ;

        // current time-space slot used by class
        pos1 = ( *it ).second;

        CourseClass* cc1 = ( *it ).first;

        // determine position of class randomly
        int nr = Configuration::GetInstance().GetNumberOfRooms();
        int dur = cc1->GetDuration();
        int day = rand() % DAYS_NUM;
        int room = rand() % nr;
        int time = rand() % ( DAY_HOURS + 1 - dur );
        int pos2 = day * nr * DAY_HOURS + room * DAY_HOURS + time;

        // move all time-space slots
        for( int i = dur - 1; i >= 0; i-- )
        {
            // remove class hour from current time-space slot
            list<CourseClass*>& cl = _slots[ pos1 + i ];
            for( list<CourseClass*>::iterator it = cl.begin(); it != cl.end(); it++ )
            {
                if( *it == cc1 )
                {
                    cl.erase( it );
                    break;
                }
            }

            // move class hour to new time-space slot
            _slots.at( pos2 + i ).push_back( cc1 );
        }

        // change entry of class table to point to new time-space slots
        _classes[ cc1 ] = pos2;
    }

    CalculateFitness();
}

// Calculates fitness value of chromosome
void Schedule::CalculateFitness()
{
    // chromosome's score
    int score = 0;

    int numberOfRooms = Configuration::GetInstance().GetNumberOfRooms();
    int daySize = DAY_HOURS * numberOfRooms;

    int ci = 0;

    // check criterias and calculate scores for each class in schedule
    for( map<CourseClass*, int>::const_iterator it = _classes.begin(); it != _classes.end(); ++it, ci += 5 )
    {
        // coordinate of time-space slot
        int p = ( *it ).second;
        int day = p / daySize;
        int time = p % daySize;
        int room = time / DAY_HOURS;
        time = time % DAY_HOURS;

        int dur = ( *it ).first->GetDuration();

        // check for room overlapping of classes
        bool ro = false;
        for( int i = dur - 1; i >= 0; i-- )
        {
            if( _slots[ p + i ].size() > 1 )
            {
                ro = true;
                break;
            }
        }

        // on room overlaping
        if( !ro )
            score++;

        _criteria[ ci + 0 ] = !ro;

        CourseClass* cc = ( *it ).first;
        Room* r = Configuration::GetInstance().GetRoomById( room );
        // does current room have enough seats
        _criteria[ ci + 1 ] = r->GetNumberOfSeats() >= cc->GetNumberOfSeats();
        if( _criteria[ ci + 1 ] )
            score++;

        // does current room have computers if they are required
        _criteria[ ci + 2 ] = !cc->IsProjectorRequired() || ( cc->IsProjectorRequired() && r->IsProjector() );
        if( _criteria[ ci + 2 ] )
            score++;

        bool po = false, go = false;
        // check overlapping of classes for professors and student groups
        for( int i = numberOfRooms, t = day * daySize + time; i > 0; i--, t += DAY_HOURS )
        {
            // for each hour of class
            for( int i = dur - 1; i >= 0; i-- )
            {
                // check for overlapping with other classes at same time
                const list<CourseClass*>& cl = _slots[ t + i ];
                for( list<CourseClass*>::const_iterator it = cl.begin(); it != cl.end(); it++ )
                {
                    if( cc != *it )
                    {
                        // professor overlaps?
                        if( !po && cc->ProfessorOverlaps( **it ) )
                            po = true;

                        // student group overlaps?
                        if( !go && cc->GroupsOverlap( **it ) )
                            go = true;

                        // both type of overlapping? no need to check more
                        if( po && go )
                            goto total_overlap;
                    }
                }
            }
        }

    total_overlap:

        // professors have no overlaping classes?
        if( !po )
            score++;
        _criteria[ ci + 3 ] = !po;

        // student groups has no overlaping classes?
        if( !go )
            score++;
        _criteria[ ci + 4 ] = !go;
    }

    // calculate fitess value based on score
    _fitness = (float)score / ( Configuration::GetInstance().GetNumberOfCourseClasses() * DAYS_NUM );
}

// Pointer to global instance of algorithm
Algorithm* Algorithm::_instance = NULL;


// Returns reference to global instance of algorithm
Algorithm& Algorithm::GetInstance()
{

    // global instance doesn't exist?
    if( _instance == NULL )
    {
        // set seed for random generator
        srand( GetTickCount() );

        // make prototype of chromosomes
        Schedule* prototype = new Schedule( 2, 2, 80, 3 );

        // make new global instance of algorithm using chromosome prototype
        _instance = new Algorithm( 100, 8, 5, prototype );
    }

    return *_instance;
}

// Frees memory used by gloval instance
void Algorithm::FreeInstance()
{

    // free memory used by global instance if it exists
    if( _instance != NULL )
    {
        delete _instance->_prototype;
        delete _instance;

        _instance = NULL;
    }
}

// Initializes genetic algorithm
Algorithm::Algorithm(int numberOfChromosomes, int replaceByGeneration, int trackBest,
                     Schedule* prototype) : _replaceByGeneration(replaceByGeneration),
_currentBestSize(0),
_prototype(prototype),
_currentGeneration(0),
_state(AS_USER_STOPED)
{
    // there should be at least 2 chromosomes in population
    if( numberOfChromosomes < 2 )
        numberOfChromosomes = 2;

    // and algorithm should track at least on of best chromosomes
    if( trackBest < 1 )
        trackBest = 1;

    if( _replaceByGeneration < 1 )
        _replaceByGeneration = 1;
    else if( _replaceByGeneration > numberOfChromosomes - trackBest )
        _replaceByGeneration = numberOfChromosomes - trackBest;

    // reserve space for population
    _chromosomes.resize( numberOfChromosomes );
    _bestFlags.resize( numberOfChromosomes );

    // reserve space for best chromosome group
    _bestChromosomes.resize( trackBest );

    // clear population
    for( int i = (int)_chromosomes.size() - 1; i >= 0; --i )
    {
        _chromosomes[ i ] = NULL;
        _bestFlags[ i ] = false;
    }
}

// Frees used resources
Algorithm::~Algorithm()
{
    // clear population by deleting chromosomes
    for( vector<Schedule*>::iterator it = _chromosomes.begin(); it != _chromosomes.end(); ++it )
    {
        if( *it )
            delete *it;
    }
}

void Algorithm::Start()
{
    if( !_prototype )
        return;


    // do not run already running algorithm
    if( _state == AS_RUNNING )
        return;

    _state = AS_RUNNING;



    // clear best chromosome group from previous execution
    ClearBest();

    // initialize new population with chromosomes randomly built using prototype
    int i = 0;
    for( vector<Schedule*>::iterator it = _chromosomes.begin(); it != _chromosomes.end(); ++it, ++i )
    {
        // remove chromosome from previous execution
        if( *it )
            delete *it;

        // add new chromosome to population
        *it = _prototype->MakeNewFromPrototype();
        AddToBest( i );
    }

    _currentGeneration = 0;

    while( 1 )
    {

        // user has stopped execution?
        if( _state != AS_RUNNING )
            break;

        Schedule* best = GetBestChromosome();

        // algorithm has reached criteria?
        if( best->GetFitness() >= 1 )
        {
            _state = AS_CRITERIA_STOPPED;
            break;
        }

        // produce offepsing
        vector<Schedule*> offspring;
        offspring.resize( _replaceByGeneration );
        for( int j = 0; j < _replaceByGeneration; j++ )
        {
            // selects parent randomly
            Schedule* p1 = _chromosomes[ rand() % _chromosomes.size() ];
            Schedule* p2 = _chromosomes[ rand() % _chromosomes.size() ];

            offspring[ j ] = p1->Crossover( *p2 );
            offspring[ j ]->Mutation();
        }

        // replace chromosomes of current operation with offspring
        for( int j = 0; j < _replaceByGeneration; j++ )
        {
            int ci;
            do
            {
                // select chromosome for replacement randomly
                ci = rand() % (int)_chromosomes.size();

                // protect best chromosomes from replacement
            } while( IsInBest( ci ) );

            // replace chromosomes
            delete _chromosomes[ ci ];
            _chromosomes[ ci ] = offspring[ j ];

            // try to add new chromosomes in best chromosome group
            AddToBest( ci );
        }


        _currentGeneration++;
    }

}

// Stops execution of algoruthm
void Algorithm::Stop()
{

    if( _state == AS_RUNNING )
        _state = AS_USER_STOPED;

}

// Returns pointer to best chromosomes in population
Schedule* Algorithm::GetBestChromosome() const
{
    return _chromosomes[ _bestChromosomes[ 0 ] ];
}

// Tries to add chromosomes in best chromosome group
void Algorithm::AddToBest(int chromosomeIndex)
{
    // don't add if new chromosome hasn't fitness big enough for best chromosome group
    // or it is already in the group?
    if( ( _currentBestSize == (int)_bestChromosomes.size() &&
         _chromosomes[ _bestChromosomes[ _currentBestSize - 1 ] ]->GetFitness() >=
         _chromosomes[ chromosomeIndex ]->GetFitness() ) || _bestFlags[ chromosomeIndex ] )
        return;

    // find place for new chromosome
    int i = _currentBestSize;
    for( ; i > 0; i-- )
    {
        // group is not full?
        if( i < (int)_bestChromosomes.size() )
        {
            // position of new chromosomes is found?
            if( _chromosomes[ _bestChromosomes[ i - 1 ] ]->GetFitness() >
               _chromosomes[ chromosomeIndex ]->GetFitness() )
                break;

            // move chromosomes to make room for new
            _bestChromosomes[ i ] = _bestChromosomes[ i - 1 ];
        }
        else
            // group is full remove worst chromosomes in the group
            _bestFlags[ _bestChromosomes[ i - 1 ] ] = false;
    }

    // store chromosome in best chromosome group
    _bestChromosomes[ i ] = chromosomeIndex;
    _bestFlags[ chromosomeIndex ] = true;

    // increase current size if it has not reached the limit yet
    if( _currentBestSize < (int)_bestChromosomes.size() )
        _currentBestSize++;
}

// Returns TRUE if chromosome belongs to best chromosome group
bool Algorithm::IsInBest(int chromosomeIndex)
{
    return _bestFlags[ chromosomeIndex ];
}

// Clears best chromosome group
void Algorithm::ClearBest()
{
    for( int i = (int)_bestFlags.size() - 1; i >= 0; --i )
        _bestFlags[ i ] = false;

    _currentBestSize = 0;
}
