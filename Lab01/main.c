#include <stdio.h>
#include <stdlib.h>
#include <time.h>

//Sets the seed to insure different numbers are generated
void startRandom();

//Returns a random integer
int generateRandom();


int main() {


    startRandom();

    printf("%d", generateRandom());
    printf("%d", generateRandom());
    printf("%d", generateRandom());


    return 0;
}

void startRandom() {
    srand(time(NULL));
}

int generateRandom() {

    int random = rand() % 100 + 1;

    return random;
    
}


