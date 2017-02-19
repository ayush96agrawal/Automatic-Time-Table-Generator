#include <sstream>
#include "Configuration.h"
#include "Professor.cpp"
#include "Course.cpp"
#include "StudentsGroup.cpp"
#include "CourseClass.cpp"
#include "Room.cpp"
using namespace std;

Configuration Configuration::_instance;


// Frees used resources
Configuration::~Configuration()
{
    for( map<int, Professor*>::iterator it = _professors.begin(); it != _professors.end(); it++ )
        delete ( *it ).second;

    for( map<int, StudentsGroup*>::iterator it = _studentGroups.begin(); it != _studentGroups.end(); it++ )
        delete ( *it ).second;

    for( map<int, Course*>::iterator it = _courses.begin(); it != _courses.end(); it++ )
        delete ( *it ).second;

    for( map<int, Room*>::iterator it = _rooms.begin(); it != _rooms.end(); it++ )
        delete ( *it ).second;

    for( list<CourseClass*>::iterator it = _courseClasses.begin(); it != _courseClasses.end(); it++ )
        delete *it;
}

// Parse file and store parsed object
void Configuration::ParseFile(char* fileName)
{
    // clear previously parsed objects
    _professors.clear();
    _studentGroups.clear();
    _courses.clear();
    _rooms.clear();
    _courseClasses.clear();

    Room::RestartIDs();

    ifstream input("prof.cfg");
    string line,id,name,number;
    while( input.is_open() && !input.eof() )
    {
        getline(input,id);
        getline(input,name);
        Professor* p = new Professor(atoi(id.c_str()),name);
        _professors.insert( pair<int, Professor*>( p->GetId(), p ) );
    }
    input.close();

    input.open("course.cfg");
    while( input.is_open() && !input.eof() )
    {
        getline(input,id);
        getline(input,name);
        Course* c = new Course(atoi(id.c_str()),name);
        _courses.insert( pair<int, Course*>( c->GetId(), c ) );
    }
    input.close();

    input.open("room.cfg");
    while( input.is_open() && !input.eof() )
    {
        getline(input,name);
        getline(input,id);
        getline(input,number);
        Room* r = new Room(name,id=="1"?true:false,atoi(number.c_str()));
        _rooms.insert( pair<int, Room*>( r->GetId(), r ) );
    }
    input.close();

    input.open("group.cfg");
    while( input.is_open() && !input.eof() )
    {
        getline(input,id);
        getline(input,name);
        getline(input,number);
        StudentsGroup* g = new StudentsGroup(atoi(id.c_str()),name,atoi(number.c_str()));
        _studentGroups.insert( pair<int, StudentsGroup*>( g->GetId(), g ) );
        _studentGroups2.insert( pair<string, StudentsGroup*>( g->GetName(), g ) );
    }
    input.close();

    string pr,co,du,gr,lb;
    input.open("class.cfg");
    while( input.is_open() && !input.eof() )
    {
        getline(input,pr);
        getline(input,co);
        getline(input,du);
        getline(input,gr);
        getline(input,lb);
        stringstream ss(gr);
        string st;
        list<StudentsGroup*> s;
        ss>>st;
        while(ss){
            s.push_back(_studentGroups2[st]);
            ss>>st;
        }
        CourseClass* cc = new CourseClass(_professors[atoi(pr.c_str())],_courses[atoi(co.c_str())],s,lb=="1"?true:false,atoi(du.c_str()));
        _courseClasses.push_back( cc );
    }
    input.close();

    _isEmpty = false;
}
