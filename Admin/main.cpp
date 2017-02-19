#include<fstream>
#include<iostream>
#include<vector>
#include<list>
#include<string>
#include<windows.h>
#include "Configuration.cpp"
#include "Schedule.cpp"
using namespace std;
int main(int argc, char *argsv[])
{
    char* file="Data.cfg";
    Configuration::GetInstance().ParseFile(file);
    Algorithm::GetInstance().Start();
    Schedule* best = Algorithm::GetInstance().GetBestChromosome();
    vector<list<CourseClass*> > slots = best->GetSlots();
    ofstream out("tt.cfg");
    int room_id = 0, day_id = 0, slot_id = 0;

    for(int i=0;i<slots.size();i++)
    {
        if(i % (DAY_HOURS * Configuration::GetInstance().GetNumberOfRooms()) == 0)
            day_id++;
        if(i% DAY_HOURS == 0)
            slot_id = 1;
        else
            slot_id++;
        if(i % DAY_HOURS == 0)
            room_id++;
        room_id %= Configuration::GetInstance().GetNumberOfRooms();
        if(room_id == 0)
            room_id = Configuration::GetInstance().GetNumberOfRooms();
        list<CourseClass*>::iterator it = slots[i].begin();
        if(!(slots[i].empty()))
        {
            out << day_id <<endl;
            out << slot_id << endl;
            out << ((*it)->GetCourse()).GetId() << endl;
            out << ((*it)->GetProfessor()).GetId() << endl;
            list<StudentsGroup*>::const_iterator groups = ((*it)->GetGroups()).begin();
            for(int i=0;i< (*it)->GetGroups().size();i++)
            {
                out << ((*groups)->GetName()) <<" ";
                groups++;
            }
            out << endl;
            out << room_id;
            if(i != slots.size() - 1)
                out << endl;
        }
        else
        {
            out << day_id <<endl;
            out << slot_id << endl;
            out << -1 << endl;
            out << -1 << endl;
            out << -1 << endl;
            out << room_id;
            if(i != slots.size() - 1)
                out << endl;
        }
    }
    return 0;
}
