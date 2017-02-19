
#include <list>
#include <string>

using namespace std;

class CourseClass;

// Stores data about professor
class Professor
{
    
private:
    
    // Professor's ID
    int _id;
    
    // Professor's Name
    string _name;
    
    // List of classes that professor teaches
    list<CourseClass*> _courseClasses;
    
public:
    
    // Initializes professor data
    Professor(int id, const string& name);
    
    // Bind professor to course
    void AddCourseClass(CourseClass* courseClass);
    
    // Returns professor's ID
    inline int GetId() const { return _id; }
    
    // Returns professor's name
    inline const string& GetName() const { return _name; }
    
    // Returns reference to list of classes that professor teaches
    inline const list<CourseClass*>& GetCourseClasses() const { return _courseClasses; }
    
    // Compares ID's of two objects which represent professors
    inline bool operator ==(const Professor& rhs) const { return _id == rhs._id; }
    
};
