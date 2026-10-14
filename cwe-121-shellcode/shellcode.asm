section .text                   ; segmento TEXT
    global _start               ; punto de entrada del ELF

_start:
    jmp short dummy             ; 1. salto a un dummy con el call

imprimir_str:                   ; 3. syscall write()
    pop ecx                     ; ecx => "ganaste jorge!"
    mov al, 4                   ; syscall write: #4
    xor ebx, ebx                ; ebx = 0
    inc ebx                     ; stdout filedescriptor: #1
    xor edx, edx                ; edx = 0
    mov dl, 9                   ; longitud "you win!\0": 9
    int 0x80                    ; write(1, string, 9)

    mov al, 1                   ; syscall exit: #1
    dec ebx                     ; ebx = 0
    int 0x80                    ; exit(0)

dummy:                          ;
    call imprimir_str           ; 2. llamo al código encargado de imprimir el mensaje
    db 'you win!', 0x0b         ; antes de saltar apila dirección de "you win!\v"
                                ; para retornar luego del call