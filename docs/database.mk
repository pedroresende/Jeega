### Some definitions ###

# Column options
opt: options / indexes
    - P: primary key
    - F: foreign key
    - A: auto increment
    - U: unique
    - N: not null
    - I: indexed
    - D=?: default value is "?"

# Versions options
Status
    1 - ARCHIVED
    2 - PUBLISHED
    3 - DRAFT

### System Block ###

###
# Remote_IDs is a table with unique IDs for each kind of object as class, object, user...
# This will make a multi system comunication much easier
TABLE REMOTE_IDS
    ID                  - VARCHAR(32)       - opt:PUN 
    
### Language Block ###
# TODO

TABLE LANGUAGE
    ID                  - UNSIGNED INTEGER  - opt:PAUN
    LANGUAGE            - VARCHAR(32)       - opt:UN
    ALPHA2              - VARCHAR(2)        - opt:UN
    ALPHA3              - VARCHAR(3)        - opt:UN
    
### User Block ###
# TODO

TABLE USERS
    ID                  - UNSIGNED INTEGER  - opt:PAUN

### Class Block ###

###
# Class groups serve to aggregate the classes into logical groups
# the group detais are the displayable data in the possible languages
TABLE CLASS_GROUPS
    ID                  - UNSIGNED INTEGER  - opt:PAUN
    REMOTE_ID           - opt:F
    MAIN_LANGUAGE_ID    - opt:F
    IDENTIFIER          - VARCHAR(32)       - opt:I

TABLE CLASS_GROUP_DETAILS
    CLASS_GROUP_ID      - opt:PF
    LANGUAGE_ID         - opt:PF
    NAME                - VARCHAR(255)      - opt:N
    DESCRIPTION         - TEXT

TABLE CLASSES
    ID                  - UNSIGNED INTEGER  - opt:PAUN
    CLASS_GROUP_ID      - opt:F 
    REMOTE_ID           - opt:F
    MAIN_LANGUAGE_ID    - opt:F            
    IDENTIFIER          - VARCHAR(32)       - opt:I
    ENABLED             - BOOL              - opt:D=1
    CREATED_BY          - opt:F
    CREATED_AT          - TIMESTAMP
    DELETED_AT          - TIMESTAMP

TABLE CLASS_VERSION
    ID                  - UNSIGNED INTEGER  - opt:PAN
    VERSION             - UNSIGNED INTEGER  - opt:PN
    VERSION_STATUS      - INTEGER           - opt:ND=1
    OBJECT_NAME_PATTERN - VARCHAR(255)
    CREATED_AT          - TIMESTAMP
    DELETED_AT          - TIMESTAMP
    
TABLE CLASS_DETAILS
    CLASS_ID            - opt:PF
    CLASS_VERSION       - opt:PF
    LANGUAGE_ID         - opt:PF
    NAME                - VARCHAR(255)      - opt:N
    DESCRIPTION         - TEXT
    
TABLE FIELDTYPES
    ID                  - UNSIGNED INTEGER  - opt:PAN
    CLASS_ID            - opt:F
    VERSION             - opt:F
    TYPE                - VARCHAR(32)       - opt:N
    IDENTFIER           - VARCHAR(32)       - opt:IN
    POSITION            - INTEGER
    TRANSLATABLE        - BOOL              - opt:ND=1
    INFO_COLLECTOR      - BOOL              - opt:ND=0
    REQUIRED            - BOOL              - opt:ND=0
    SEARCHEABLE         - BOOL              - opt:ND=1

TABLE FIELDTYPE_DETAILS
    FIELDTYPE_ID        - opt:PF
    LANGUAGE_ID         - opt:PF
    NAME                - VARCHAR(255)      - opt:N
    DESCRIPTION         - TEXT
    
TABLE FIELDTYPE_DEFINITIONS
    FIELDTYPE_ID        - opt:PF
    LANGUAGE_ID         - opt:PF
    FLOAT               - FLOAT
    INTEGER             - INTEGER
    STRING              - VARCHAR(2048)
    KEY                 - VARCHAR(2048)
    TEXT                - TEXT
    SETTINGS            - TEXT
