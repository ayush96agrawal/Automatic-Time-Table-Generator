
#include <list>
#include <string>

using namespace std;

class CourseClass;

// Stores data about student group
class StudentsGroup
{
    
private:
    
    // Student group ID
    int _id;
    
    // Name of student group
    string _name;
    
    // Number of students in group
    int _numberOfStudents;
    
    // List of classes that group attends
    list<CourseClass*> _courseClasses;
    
public:
    
    // Initializes student group data
    StudentsGroup(int id, const string& name, int numberOfStudents);
    
    // Bind group to class
    void AddClass(CourseClass* courseClass);
    
    // Returns student group ID
    inline int GetId() const { return _id; }
    
    // Returns name of student group
    inline const string& GetName() const { return _name; }
    
    // Returns number of students in group
    inline int GetNumberOfStudents() const { return _numberOfStudents; }
    
    // Returns reference to list of classes that group attends
    inline const list<CourseClass*>& GetCourseClasses() const { return _courseClasses; }
    
    // Compares ID's of two objects which represent student groups
    inline bool operator ==(const StudentsGroup& rhs) const { return _id == rhs._id; }
    
};
