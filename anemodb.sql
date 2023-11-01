CREATE TABLE userdb (
    nama VARCHAR(255) NOT NULL,
    nim VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE datadb (
    nik INT(11) NOT NULL,
    nm VARCHAR(64) NOT NULL,
    almt VARCHAR(255) NOT NULL,
    jkl VARCHAR(16) NOT NULL,
    skl VARCHAR(50) NOT NULL
);

CREATE TABLE matkuldb (
    kode_matkul VARCHAR(255),
    matkul VARCHAR(512) NOT NULL,
    deskripsi VARCHAR(8192) NULL,
    createdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (kode_matkul)
);

CREATE TABLE materidb (
    kode_matkul VARCHAR(255),
    jdmateri1 VARCHAR(512) DEFAULT NULL,
    materi1 TEXT DEFAULT NULL,
    jdmateri2 VARCHAR(512) DEFAULT NULL,
    materi2 TEXT DEFAULT NULL,
    jdmateri3 VARCHAR(512) DEFAULT NULL,
    materi3 TEXT DEFAULT NULL,
    jdmateri4 VARCHAR(512) DEFAULT NULL,
    materi4 TEXT DEFAULT NULL,
    jdmateri5 VARCHAR(512) DEFAULT NULL,
    materi5 TEXT DEFAULT NULL,
    jdmateri6 VARCHAR(512) DEFAULT NULL,
    materi6 TEXT DEFAULT NULL,
    jdmateri7 VARCHAR(512) DEFAULT NULL,
    materi7 TEXT DEFAULT NULL,
    jdmateri8 VARCHAR(512) DEFAULT NULL,
    materi8 TEXT DEFAULT NULL,
    jdmateri9 VARCHAR(512) DEFAULT NULL,
    materi9 TEXT DEFAULT NULL,
    jdmateri10 VARCHAR(512) DEFAULT NULL,
    materi10 TEXT DEFAULT NULL,
    jdmateri11 VARCHAR(512) DEFAULT NULL,
    materi11 TEXT DEFAULT NULL,
    jdmateri12 VARCHAR(512) DEFAULT NULL,
    materi12 TEXT DEFAULT NULL,
    jdmateri13 VARCHAR(512) DEFAULT NULL,
    materi13 TEXT DEFAULT NULL,
    jdmateri14 VARCHAR(512) DEFAULT NULL,
    materi14 TEXT DEFAULT NULL,
    PRIMARY KEY (kode_matkul)
);