#include<fstream>
#include<iostream>
#include<vector>
#include<list>
#include<string>
#include<windows.h>
#include "Configuration.cpp"
#include "Schedule.cpp"
using namespace std;
int main()
{
    char* file="Data.cfg";
    Configuration::GetInstance().ParseFile(file);
    Algorithm::GetInstance().Start();
    Schedule* best = Algorithm::GetInstance().GetBestChromosome();
    vector<list<CourseClass*> > slots = best->GetSlots();
    ofstream out("tt.cfg");
    int room_id=0;
    for(int i=0;i<slots.size();i++)
    {
        if(i % DAY_HOURS == 0)
            room_id++;
        room_id %= Configuration::GetInstance().GetNumberOfRooms();
        if(room_id == 0)
            room_id = Configuration::GetInstance().GetNumberOfRooms();
        list<CourseClass*>::iterator it = slots[i].begin();
        if(!(slots[i].empty()))
        {
            out << ((*it)->GetCourse()).GetName() << endl;
            out << ((*it)->GetProfessor()).GetName() << endl;
            out << room_id << endl;
        }
        else
        {
            out << -1 << endl;
        }
    }
    return 0;
}
