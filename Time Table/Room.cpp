
#include "Room.h"

int Room::_nextRoomId = 0;

// Initializes room data and assign ID to room
Room::Room(const string& name, bool projector, int numberOfSeats) : _id(_nextRoomId++),
_name(name),
_projector(projector),
_numberOfSeats(numberOfSeats) { }
