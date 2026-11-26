#include <stdio.h>

int main()
{
    char buffer[16];
    gets(buffer);
    printf(buffer);
    printf("\n");
}