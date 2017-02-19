
#include <string>

using namespace std;

// Stores data about classroom
class Room
{

private:

    // ID counter used to assign IDs automatically
    static int _nextRoomId;

    // Room ID - automatically assigned
    int _id;

    // Room name
    string _name;

    // Indicates if room has projectors
    bool _projector;

    // Number of seats in room
    int _numberOfSeats;

public:

    // Initializes room data and assign ID to room
    Room(const string& name, bool projector, int numberOfSeats);

    // Returns room ID
    inline int GetId() const { return _id; }

    // Returns name
    inline const string& GetName() const { return _name; }

    // Returns TRUE if room has projector otherwise it returns FALSE
    inline bool IsProjector() const { return _projector; }

    // Returns number of seats in room
    inline int GetNumberOfSeats() const { return _numberOfSeats; }

    // Restarts ID assigments
    static inline void RestartIDs() { _nextRoomId = 0; }

};
