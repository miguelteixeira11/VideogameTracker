<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE visitantes (
	nome			 char(255),
	idade		 smallint,
	email		 char(255),
	sexo			 text,
	cargo		 text,
	redesocialechat_email char(255) NOT NULL,
	PRIMARY KEY(email)
);

CREATE TABLE jogos (
	nome		 char(255),
	pegi		 numeric(8,2),
	companhia	 char(255),
	consola	 char(255),
	id		 numeric(8,2),
	tempomaisjogado timestamp,
	classificacao	 float(8),
	PRIMARY KEY(id)
);

CREATE TABLE consolas (
	nome		 char(255),
	companhia	 char(255),
	jogosmaisjogados char(255),
	tempomaisjogado	 timestamp,
	PRIMARY KEY(nome)
);

CREATE TABLE redesocialechat (
	nome		 char(255),
	idade		 smallint,
	email		 char(255),
	sexo		 text,
	jogopreferido	 char(255),
	consolapreferida char(255),
	tempodejogo	 timestamp,
	comentarios	 char(255),
	PRIMARY KEY(email)
);

CREATE TABLE consolas_jogos (
	consolas_nome char(255),
	jogos_id	 numeric(8,2),
	PRIMARY KEY(consolas_nome,jogos_id)
);

CREATE TABLE redesocialechat_jogos (
	redesocialechat_email char(255),
	jogos_id		 numeric(8,2),
	PRIMARY KEY(redesocialechat_email,jogos_id)
);

CREATE TABLE consolas_redesocialechat (
	consolas_nome	 char(255),
	redesocialechat_email char(255),
	PRIMARY KEY(consolas_nome,redesocialechat_email)
);

CREATE TABLE visitantes_jogos (
	visitantes_email char(255),
	jogos_id	 numeric(8,2),
	PRIMARY KEY(visitantes_email,jogos_id)
);

CREATE TABLE visitantes_consolas (
	visitantes_email char(255),
	consolas_nome	 char(255),
	PRIMARY KEY(visitantes_email,consolas_nome)
);

ALTER TABLE visitantes ADD CONSTRAINT visitantes_fk1 FOREIGN KEY (redesocialechat_email) REFERENCES redesocialechat(email);
ALTER TABLE consolas_jogos ADD CONSTRAINT consolas_jogos_fk1 FOREIGN KEY (consolas_nome) REFERENCES consolas(nome);
ALTER TABLE consolas_jogos ADD CONSTRAINT consolas_jogos_fk2 FOREIGN KEY (jogos_id) REFERENCES jogos(id);
ALTER TABLE redesocialechat_jogos ADD CONSTRAINT redesocialechat_jogos_fk1 FOREIGN KEY (redesocialechat_email) REFERENCES redesocialechat(email);
ALTER TABLE redesocialechat_jogos ADD CONSTRAINT redesocialechat_jogos_fk2 FOREIGN KEY (jogos_id) REFERENCES jogos(id);
ALTER TABLE consolas_redesocialechat ADD CONSTRAINT consolas_redesocialechat_fk1 FOREIGN KEY (consolas_nome) REFERENCES consolas(nome);
ALTER TABLE consolas_redesocialechat ADD CONSTRAINT consolas_redesocialechat_fk2 FOREIGN KEY (redesocialechat_email) REFERENCES redesocialechat(email);
ALTER TABLE visitantes_jogos ADD CONSTRAINT visitantes_jogos_fk1 FOREIGN KEY (visitantes_email) REFERENCES visitantes(email);
ALTER TABLE visitantes_jogos ADD CONSTRAINT visitantes_jogos_fk2 FOREIGN KEY (jogos_id) REFERENCES jogos(id);
ALTER TABLE visitantes_consolas ADD CONSTRAINT visitantes_consolas_fk1 FOREIGN KEY (visitantes_email) REFERENCES visitantes(email);
ALTER TABLE visitantes_consolas ADD CONSTRAINT visitantes_consolas_fk2 FOREIGN KEY (consolas_nome) REFERENCES consolas(nome);";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>