# payload.py

# Sabemos que la cadena password[10] mide 10 bytes
# Sabemos que strncmp(password, correctPassword, 10)
# compara 10 bytes de ambas variables
# Esto da una longitud de 20 bytes de la pila

output = "A" * 20
print(output)