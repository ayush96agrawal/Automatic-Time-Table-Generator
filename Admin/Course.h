
#include <string>

using namespace std;

// Stores data about course
class Course
{
    
private:
    
    // Course ID
    int _id;
    
    // Course name
    string _name;
    
public:
    
    // Initializes course
    Course(int id, const string& name);
    
    // Returns course ID
    inline int GetId() const { return _id; }
    
    // Returns course name
    inline const string& GetName() const { return _name; }
    
};
