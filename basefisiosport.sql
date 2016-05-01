DROP TABLE Administrador;
DROP TABLE Empleado;
DROP TABLE EntrenamientosEjercicios;
DROP TABLE Entrenamientos;
DROP TABLE ActividadEspecifica;
DROP TABLE Actividad;
DROP TABLE LineaFactura;
DROP TABLE Facturas;
DROP TABLE Carrito;
DROP TABLE Productos;
DROP TABLE Cliente;
DROP TABLE Persona;

CREATE TABLE administrador ( 
usuario VARCHAR2(20) NOT NULL , 
pass VARCHAR2(32) NOT NULL , 
CONSTRAINT administrador_fk PRIMARY KEY (usuario)
);
/

CREATE TABLE Persona (
Nombre VARCHAR2 (50) NOT NULL,
Apellidos VARCHAR2(50) NOT NULL,
DNI CHAR(9) NOT NULL ,
Email VARCHAR2 (50) NOT NULL,
Sexo VARCHAR2(1) NOT NULL ,
Telefono VARCHAR2 (9) NOT NULL,
FechaNacimiento DATE NOT NULL,
Direccion VARCHAR2(255) NOT NULL,
pass VARCHAR2(32) NOT NULL , 
Baja INT NOT NULL,
CONSTRAINT PERSONA_PK PRIMARY KEY (DNI),
CHECK (Sexo IN ('H' , 'M'))
);
/

CREATE TABLE Cliente (
IDCliente INT NOT NULL ,
DNIPersona CHAR(9) NOT NULL ,
CONSTRAINT Cliente_PK PRIMARY KEY (IDCliente),
CONSTRAINT CLIENTE_FK FOREIGN KEY (DNIPersona) REFERENCES Persona
);
/

CREATE TABLE Empleado (
IDEmpleado INT NOT NULL,
DNIPersona CHAR(9) NOT NULL,
CONSTRAINT EMPLEADO_PK PRIMARY KEY (IDEmpleado),
CONSTRAINT EMPLEADO_FK FOREIGN KEY (DNIPersona) REFERENCES Persona(DNI)
);

CREATE TABLE Actividad (
IDActividad INT NOT NULL,
Nombre VARCHAR2 (50) NOT NULL,
CONSTRAINT ACTIVIDAD_PK PRIMARY KEY (IDActividad)
);
/
CREATE TABLE ActividadEspecifica (
IDActividadEspecifica INT NOT NULL,
IDActividad INT NOT NULL,
Nombre VARCHAR2(50) NOT NULL,
Descripcion VARCHAR2(255),
CONSTRAINT ACtividadEspecifica_FK FOREIGN KEY (IDActividad) REFERENCES Actividad(IDActividad),
PRIMARY KEY(IDActividadEspecifica)
);
/
CREATE TABLE Entrenamientos (
IDEntrenamiento INT NOT NULL,
IDCliente INT NOT NULL,
FechaInicio DATE NOT NULL,
FechaFin DATE NOT NULL,
IDActividad INT NOT NULL,
Descripcion VARCHAR2(255),
CONSTRAINT Entrenamientos_FK FOREIGN KEY (IDCliente) REFERENCES Cliente(IDCliente),
CONSTRAINT EntrenamientosActividades_FK FOREIGN KEY (IDActividad) REFERENCES Actividad(IDActividad),
PRIMARY KEY(IDEntrenamiento)
);
/
CREATE TABLE EntrenamientosEjercicios (
IDEntrenamiento INT NOT NULL,
IDActividadEspecifica INT NOT NULL,
CONSTRAINT EntrenamientosEjercicios_FK FOREIGN KEY (IDEntrenamiento) REFERENCES Entrenamientos(IDEntrenamiento),
CONSTRAINT EntrenamientosAEspecificas_FK FOREIGN KEY (IDActividadEspecifica) REFERENCES ActividadEspecifica(IDActividadEspecifica),
PRIMARY KEY(IDEntrenamiento,IDActividadEspecifica)
);
/

CREATE TABLE Productos (
IDProducto INT NOT NULL,
Nombre  VARCHAR2(255) NOT NULL,
Descripcion  VARCHAR2(255) NOT NULL,
Precio NUMBER(6,2) NOT NULL,
Stock INT NOT NULL,
Foto VARCHAR2(255),
PRIMARY KEY(IDProducto)
);
/

CREATE TABLE Carrito (
IDCarrito INT NOT NULL,
IDProducto INT NOT NULL,
IDCliente INT NOT NULL,
Unidades INT NOT NULL,
PRIMARY KEY(IDCarrito),
CONSTRAINT Carrito_FK FOREIGN KEY (IDCliente) REFERENCES Cliente(IDCliente),
CONSTRAINT CarritoProducto_FK FOREIGN KEY (IDProducto) REFERENCES Productos(IDProducto)
);
/

CREATE TABLE Facturas (
IDFactura INT NOT NULL,
IDCliente INT NOT NULL,
PrecioTotal NUMBER(6,2) NOT NULL,
PRIMARY KEY(IDFactura),
CONSTRAINT ClientesFacturas_FK FOREIGN KEY (IDCliente) REFERENCES Cliente(IDCliente)
);
/

CREATE TABLE LineaFactura (
IDLineaFactura INT NOT NULL,
IDProducto INT NOT NULL,
IDCliente INT NOT NULL,
IDFactura INT NOT NULL,
PrecioCompra NUMBER(6,2) NOT NULL,
Unidades INT NOT NULL,
PRIMARY KEY(IDLineaFactura),
CONSTRAINT ClientesLF_FK FOREIGN KEY (IDCliente) REFERENCES Cliente(IDCliente),
CONSTRAINT LFacturaProducto_FK FOREIGN KEY (IDProducto) REFERENCES Productos(IDProducto),
CONSTRAINT Facturas_FK FOREIGN KEY (IDFactura) REFERENCES Facturas(IDFactura)
);
/


DROP SEQUENCE sec_entrenamientos;
CREATE SEQUENCE sec_entrenamientos MINVALUE 1 INCREMENT BY 1 START WITH 1; 
/
DROP SEQUENCE sec_actividadesespecifica;
CREATE SEQUENCE sec_actividadesespecifica MINVALUE 1 INCREMENT BY 1 START WITH 1; 
/
DROP SEQUENCE sec_clientes;
CREATE SEQUENCE sec_clientes MINVALUE 1 INCREMENT BY 1 START WITH 1; 
/
DROP SEQUENCE sec_empleados;
CREATE SEQUENCE sec_empleados MINVALUE 1 INCREMENT BY 1 START WITH 1; 
/
DROP SEQUENCE sec_facturas;
CREATE SEQUENCE sec_facturas MINVALUE 1 INCREMENT BY 1 START WITH 1; 
/
DROP SEQUENCE sec_lineafacturas;
CREATE SEQUENCE sec_lineafacturas MINVALUE 1 INCREMENT BY 1 START WITH 1; 
/
DROP SEQUENCE sec_actividades;
CREATE SEQUENCE sec_actividades MINVALUE 1 INCREMENT BY 1 START WITH 1; 
DROP SEQUENCE sec_carrito;
CREATE SEQUENCE sec_carrito MINVALUE 1 INCREMENT BY 1 START WITH 1;
DROP SEQUENCE sec_productos;
CREATE SEQUENCE sec_productos MINVALUE 1 INCREMENT BY 1 START WITH 1; 
/

commit;

-- Zona de Inicializar la Base de Datos para la web

-- INSERT INTO nombretabla (campo1,campo2,campo3) VALUES (valorcampo1,valorcampo2,valorcampo3);
INSERT INTO administrador(usuario,pass) VALUES ('administrator','adminpass');

INSERT INTO Persona(Nombre,Apellidos,DNI,Email,Sexo,Telefono,FechaNacimiento,Direccion,pass,Baja) VALUES ('Carlos','Sevilla Barcelo','44244504W','carlosevillabarcelo@hotmail.com','H','654461273',to_date('20/10/94','DD/MM/RR'),'Guipuzcoa, n 32','carlos94',0);

INSERT INTO Persona(Nombre,Apellidos,DNI,Email,Sexo,Telefono,FechaNacimiento,Direccion,pass,Baja) VALUES ('Melissa','Sousa Gonzalez','48567985R','melissasousa94@hotmail.com','M','638471299',to_date('17/05/94','DD/MM/RR'),'Guipuzcoa, n 32','melissita94',0);

INSERT INTO Persona(Nombre,Apellidos,DNI,Email,Sexo,Telefono,FechaNacimiento,Direccion,pass,Baja) VALUES ('Agustin','Sousa Gonzalez','76247859W','shu_agu@hotmail.com','H','624778149',to_date('30/12/00','DD/MM/RR'),'Guipuzcoa, n 32','scoot22',0);

INSERT INTO Cliente(IDCliente, DNIPersona) VALUES (sec_clientes.nextval,'44244504W');
INSERT INTO Cliente(IDCliente, DNIPersona) VALUES (sec_clientes.nextval,'76247859W');

INSERT INTO Empleado(IDEmpleado, DNIPersona) VALUES (sec_empleados.nextval,'48567985R');





INSERT INTO Actividad(IDActividad, Nombre) VALUES (sec_actividades.nextval, 'Fitness');
INSERT INTO Actividad(IDActividad, Nombre) VALUES (sec_actividades.nextval, 'Musculacion');
INSERT INTO Actividad(IDActividad, Nombre) VALUES (sec_actividades.nextval, 'Adelgazante');

INSERT INTO ActividadEspecifica(IDActividadEspecifica,IDActividad,Nombre, Descripcion) VALUES(sec_actividadesespecifica.nextval,1,'Ciclo','Entrenamiento de resistencia aerobica con bicicleta estatica y musica Contribuye a a perder peso y a tonificar la musculatura de la parte inferior. ');
INSERT INTO ActividadEspecifica(IDActividadEspecifica,IDActividad,Nombre, Descripcion) VALUES(sec_actividadesespecifica.nextval,1,'Aerobic','Entrenamiento de resistencia cardiovascular, formada por  diferentes tipos de desplazamientos con una coreografia fluida, finalizando con un entrenamiento especifico de todo el cuerpo, brazos, caderas, gluteos, abdominales y piernas.');
INSERT INTO ActividadEspecifica(IDActividadEspecifica,IDActividad,Nombre, Descripcion) VALUES(sec_actividadesespecifica.nextval,1,'Cardiofit','Clase de sencillas coreografias que combina el entrenamiento de la resistencia aerobica y el trabajo localizado de la musculatura de la parte superior e inferior, haciendo uso de diversos materiales (mancuernas, step, picas, etc...).');


INSERT INTO ActividadEspecifica(IDActividadEspecifica,IDActividad,Nombre, Descripcion) VALUES(sec_actividadesespecifica.nextval,2,'Ejercicios DELTOIDES POSTERIOR','Utilizar: Leverage bench Press');
INSERT INTO ActividadEspecifica(IDActividadEspecifica,IDActividad,Nombre, Descripcion) VALUES(sec_actividadesespecifica.nextval,2,'REMO','Utilizar: Horizontal Row Machine');
INSERT INTO ActividadEspecifica(IDActividadEspecifica,IDActividad,Nombre, Descripcion) VALUES(sec_actividadesespecifica.nextval,2,'EXTENSIONES GLUTEOS-POSTERIOR','Utilizar: LegExtension-back');

INSERT INTO ActividadEspecifica(IDActividadEspecifica,IDActividad,Nombre, Descripcion) VALUES(sec_actividadesespecifica.nextval,3,'Ejercicios para adelgazar','Subir escaleras siempre que puedas, Andar 1 hora diaria y prescindir de vehiculos, Hazte con una tabla de abdominales y busca 15 minutos para practicarlaHaz 10 flexiones diarias.');


INSERT INTO Entrenamientos(IDEntrenamiento,IDCliente,FechaInicio,FechaFin,IDActividad,Descripcion) VALUES(sec_entrenamientos.nextval,1,to_date('14/10/13','DD/MM/RR'),to_date('27/12/13','DD/MM/RR'),1,'Realiza este entrenamiento a peticion del entrenador');

INSERT INTO EntrenamientosEjercicios(IDEntrenamiento,IDActividadEspecifica) VALUES (1,3);




INSERT INTO Productos(IDProducto, Nombre, Descripcion, Precio, Stock, Foto) VALUES (sec_productos.nextval, 'SportShirt MEN','Camiseta deportiva perfecta para ejercicios intensivos. Transpiracion automatica y equipada con la ultima tecnologia subacuatica.',12.95,10,'camisetanegra.jpg');


INSERT INTO Productos(IDProducto, Nombre, Descripcion, Precio, Stock, Foto) VALUES (sec_productos.nextval, 'Proteinas musculares', 'Proteinas reconstituyentes idoneas para tomar despues de un gran esfuerzo fisico.',56.25,5,'botepastillas1.jpg');


INSERT INTO Productos(IDProducto, Nombre, Descripcion, Precio, Stock, Foto) VALUES (sec_productos.nextval, 'Guantes XTREMESPORT','Guantes deportivos provistos de la ultima tecnologia de agarre.',9.99,10,'guantes.jpg');


INSERT INTO Carrito(IDCarrito,IDProducto, IDCliente, Unidades) VALUES (sec_carrito.nextval,1,1,2);
INSERT INTO Carrito(IDCarrito,IDProducto, IDCliente, Unidades) VALUES (sec_carrito.nextval,2,2,5);

INSERT INTO Facturas(IDFactura, IDCliente,PrecioTotal) VALUES (sec_facturas.nextval,1,55.65);
INSERT INTO Facturas(IDFactura, IDCliente,PrecioTotal) VALUES (sec_facturas.nextval,2,145.00);

INSERT INTO LineaFactura(IDLineaFactura, IDProducto, IDCliente, IDFactura,PrecioCompra, Unidades) VALUES (sec_lineafacturas.nextval,1,1,1,55.65,2);
INSERT INTO LineaFactura(IDLineaFactura, IDProducto, IDCliente, IDFactura,PrecioCompra, Unidades) VALUES (sec_lineafacturas.nextval,2,2,2,145.00,5);

commit;