#include <stdio.h>

int main()
{
    int cookie;
    int examen;
    char buf[118];

    printf("buf: %p cookie: %p examen: %p\n", (void*)&buf, (void*)&cookie, (void*)&examen);
    gets(buf);

    if (cookie == 0x000d0a00)
        printf("you win Jorge Manuel Cobos Castro!\n");

    return 0;
}