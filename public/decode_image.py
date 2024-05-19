import base64
import os
import psycopg2
import random
import string
import sys

# Detalles de conexión a la base de datos
DB_NAME = 'minespeedv01'
DB_USER = 'postgres'
DB_PASSWORD = 'root'
DB_HOST = '127.0.0.1'
DB_PORT = '5432'  # Cambia el puerto si es diferente

# Detalles de la tabla
TABLE_NAME = 'reports'

def recuperar_imagen_desde_db(id):
    try:
        # Establecer la conexión a la base de datos
        conn = psycopg2.connect(
            dbname=DB_NAME,
            user=DB_USER,
            password=DB_PASSWORD,
            host=DB_HOST,
            port=DB_PORT
        )

        # Crear un cursor para ejecutar consultas
        cursor = conn.cursor()

        # Ejecutar una consulta para recuperar la imagen base64 de la fila especificada
        cursor.execute(f"SELECT image FROM {TABLE_NAME} WHERE id = %s LIMIT 1", (id,))

        # Recuperar la imagen base64 de la primera fila
        base64_image = cursor.fetchone()[0]

        # Cerrar el cursor y la conexión
        cursor.close()
        conn.close()

        return base64_image

    except Exception as e:
        print("Error al recuperar la imagen desde la base de datos:", e)
        return None

def guardar_imagen_base64(base64_string):
    try:
        # Decodificar la imagen base64
        decoded_image = base64.b64decode(base64_string)
        
        # Generar un nombre de archivo aleatorio de 10 caracteres
        nombre_archivo = ''.join(random.choices(string.ascii_letters + string.digits, k=10)) + ".jpeg"
        
        # Guardar la imagen decodificada en un archivo JPEG
        with open(nombre_archivo, 'wb') as f:
            f.write(decoded_image)
        
        return nombre_archivo
    except Exception as e:
        print("Error al guardar la imagen:", e)
        return None

if __name__ == "__main__":
    # Input del ID de la fila de la base de datos
    id_db = sys.argv[1] if len(sys.argv) > 1 else ''

    # Recuperar la imagen base64 desde la base de datos usando el ID proporcionado
    base64_image = recuperar_imagen_desde_db(id_db)

    if base64_image:
        # Guardar la imagen y obtener el nombre del archivo
        nombre_archivo = guardar_imagen_base64(base64_image)

        if nombre_archivo:
            print(nombre_archivo)
        else:
            print(None)
    else:
        print("ERROR")
