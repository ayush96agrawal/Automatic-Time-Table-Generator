
#include "CourseClass.h"

// Initializes class object
CourseClass::CourseClass(Professor* professor, Course* course, const list<StudentsGroup*>& groups,
                         bool requiresProjector, int duration) :
_professor(professor),
_course(course),
_numberOfSeats(0),
_requiresProjector(requiresProjector),
_duration(duration)
{
    // bind professor to class
    _professor->AddCourseClass( this );

    // bind student groups to class
    for( list<StudentsGroup*>::const_iterator it = groups.begin(); it != groups.end(); it++ )
    {
        ( *it )->AddClass( this );
        _groups.push_back( *it );
        _numberOfSeats += ( *it )->GetNumberOfStudents();
    }
}

// Frees used memory
CourseClass::~CourseClass() { }

// Returns TRUE if another class has one or overlapping student groups.
bool CourseClass::GroupsOverlap(const CourseClass& c ) const
{
    for( list<StudentsGroup*>::const_iterator it1 = _groups.begin(); it1 != _groups.end(); it1++ )
    {
        for( list<StudentsGroup*>::const_iterator it2 = c._groups.begin(); it2 != c._groups.end(); it2++ )
        {
            if( *it1 == *it2 )
                return true;
        }
    }

    return false;
}
