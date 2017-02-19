
#include "StudentsGroup.h"

// Initializes student group data
StudentsGroup::StudentsGroup(int id, const string& name, int numberOfStudents) : _id(id),
_name(name),
_numberOfStudents(numberOfStudents)
{
}

// Bind group to class
void StudentsGroup::AddClass(CourseClass* courseClass)
{
    _courseClasses.push_back( courseClass );
}
