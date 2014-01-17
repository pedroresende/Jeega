# Database thoughs

## Some definitions

### Column options
opt: options / indexes
```
	- P: primary key
	- F: foreign key
	- A: auto increment
	- U: unique
	- N: not null
	- I: indexed
	- D=?: default value is "?"
```

### Versions options
Status
```
	1 - DRAFT			- draft every version that hasn't been published
	2 - PUBLISHED		- published version ( can only be 1 version published per object )
	3 - ARCHIVED		- old published versions
```

### Tables information
* <some_table>_details - "some_table" details table will have the displayable data with the specific language

## System Block

* Remote_IDs is a table with unique IDs for each kind of object as class, object, user...
* This will make a multi system comunication much easier


TABLE REMOTE_IDS
```
	ID						- VARCHAR(255)			- opt:PUN
```

## Class Block

* Class groups serve to aggregate the classes into logical groups
* Classes define the possible objects to be created
* Fieldtypes are the fields that the objects will have

TABLE CLASS_GROUPS
```
	ID						- UNSIGNED INTEGER		- opt:PAUN
	REMOTE_ID				- opt:FN
	MAIN_LANGUAGE_ID		- opt:FN
	IDENTIFIER				- VARCHAR(255)			- opt:IN
```

TABLE CLASS_GROUP_DETAILS
```
	CLASS_GROUP_ID			- opt:PF
	LANGUAGE_ID				- opt:PF
	NAME- VARCHAR(255)		- opt:N
	DESCRIPTION				- TEXT
```

TABLE CLASSES
```
	ID						- UNSIGNED INTEGER		- opt:PAUN
	CLASS_GROUP_ID			- opt:FN
	REMOTE_ID				- opt:FN
	IDENTIFIER				- VARCHAR(255)			- opt:IN
	ENABLED					- BOOL					- opt:D=1
	CREATED_BY				- opt:FN
	CREATED_AT				- TIMESTAMP				- opt:N
	DELETED_AT				- TIMESTAMP
```

TABLE CLASS_VERSION
```
	CLASS_ID				- UNSIGNED INTEGER		- opt:PAN
	VERSION					- INTEGER				- opt:PN
	VERSION_STATUS			- INTEGER				- opt:ND=1
	MAIN_LANGUAGE_ID		- opt:FN
	OBJECT_NAME_PATTERN		- VARCHAR(255)
	CREATED_BY				- opt:FN
	CREATED_AT				- TIMESTAMP				- opt:N
```

TABLE CLASS_DETAILS
```
	CLASS_ID				- opt:PF
	CLASS_VERSION			- opt:PF
	LANGUAGE_ID				- opt:PF
	NAME- VARCHAR(255)		- opt:N
	DESCRIPTION				- TEXT
```

TABLE FIELDTYPES
```
	ID						- UNSIGNED INTEGER		- opt:PAN
	CLASS_ID				- opt:FN
	VERSION					- opt:FN
	TYPE					- VARCHAR(255)			- opt:N
	IDENTFIER				- VARCHAR(255)			- opt:IN
	POSITION				- INTEGER
	TRANSLATABLE			- BOOL					- opt:ND=1
	INFO_COLLECTOR			- BOOL					- opt:ND=0
	SEARCHABLE				- BOOL					- opt:ND=1
	VALIDATIONS				- TEXT
```

TABLE FIELDTYPE_DETAILS
```
	FIELDTYPE_ID			- opt:PF
	LANGUAGE_ID				- opt:PF
	NAME					- VARCHAR(255)			- opt:N
	DESCRIPTION				- TEXT
	TIP						- VARCHAR(2047)
```

TABLE FIELDTYPE_DEFINITIONS
```
	FIELDTYPE_ID			- opt:PF
	LANGUAGE_ID				- opt:PF
	FLOAT					- FLOAT
	INTEGER					- INTEGER
	STRING					- VARCHAR(2047)
	KEY						- VARCHAR(2047)
	TEXT					- TEXT
	DATETIME				- DATETIME
	SETTINGS				- TEXT
```

## Object Block

TABLE OBJECTS
```
	ID					- UNSIGNED INTEGER		- opt:PAUN
	REMOTE_ID			- opt:FN
	SECTION_ID			- opt:FN
	CREATED_BY			- opt:FN
	CREATED_AT			- TIMESTAMP				- opt:N
	DELETED_AT			- TIMESTAMP
```

TABLE OBJECT_VERSIONS
```
	OBJECT_ID			- opt:PF
	VERSION				- INTEGER				- opt:PN
	CLASS_ID			- opt:F
	VERSION_ID			- opt:F
	MAIN_LANGUAGE_ID	- opt:F
	VERSION_STATUS		- INTEGER				- opt:ND=1
	AUTOSAVE			- BOOL					- opt:ND=0
```

TABLE FIELDS
```
	ID					- UNSIGNED INTEGER		- opt:PAUN
	OBJECT_ID			- opt:F
	OBJECT_VERSION		- opt:F
	FIELDTYPE_ID		- opt:F
```

TABLE FIELD_VALUES
```
	FIELD_ID			- opt:PF
	LANGUAGE_ID			- opt:PF
	FLOAT				- FLOAT
	INTEGER				- INTEGER
	STRING				- VARCHAR(2047)
	TEXT				- TEXT
	DATETIME			- DATETIME
	SETTINGS			- TEXT
```

## Locations Block

TABLE LOCATIONS
```
	ID					- UNSIGNED INTEGER		- opt:PAUN
	OBJECT_ID			- opt:FN
	REMOTE_ID			- opt:FN
	PARENT_LOCATION_ID	- opt:F
	HIDDEN				- BOOL					- opt:ND=0
	TREE_PATH			- TEXT					- opt:IN
	TREE_PATH_IDS		- VARCHAR(255)			- opt:IN
	DEPTH				- INTEGER				- opt:IN
	PRIORITY			- INTEGER				- opt:ND=1
	TOTAL_VIEWS			- INTEGER				- opt:ND=0
```

## Language Block

TABLE LANGUAGE
```
	ID					- UNSIGNED INTEGER		- opt:PAUN
	LANGUAGE			- VARCHAR(255)			- opt:UN
	ALPHA2				- VARCHAR(255)			- opt:UN
	ALPHA3				- VARCHAR(255)			- opt:UN
```

## User Block

TABLE USER_GROUPS
```
	ID					- UNSIGNED INTEGER		- opt:PAUN
	IDENTIFIER			- VARCHAR(255)			- opt:UN
	MAIN_LANGUAGE_ID	- opt:FN
	REMOTE_ID			- opt:FN
	CREATED_BY			- opt:FN
	CREATED_AT			- TIMESTAMP				- opt:N
```

TABLE USER_GROUP_DETAILS
```
	USER_GROUPS_ID		- opt:PF
	LANGUAGE_ID			- opt:PF
	NAME				- VARCHAR(255)			- opt:N
	DESCRIPTION			- TEXT
```

TABLE USERS_IN_GROUPS
```
	USER_ID
	USER_GROUP_ID
```

TABLE USERS
```
	ID					- UNSIGNED INTEGER		- opt:PAUN
	REMOTE_ID			- opt:FN
	PASSWORD			- VARCHAR(255)			- opt:N
	EMAIL				- VARCHAR(255)
	USERNAME			- VARCHAR(255)
	CREATED_BY			- opt:FN
	CREATED_AT			- TIMESTAMP				- opt:N
	DELETED_AT			- TIMESTAMP
	ENABLED				- BOOL					- opt:ND=1
```

TABLE USER_OLD_PASSWORDS
```
	ID					- UNSINGED INTEGER		- opt:PAUN
	USER_ID				- opt:FN
	PASSWORD			- VARCHAR(255)			- opt:N
	CREATED_AT			- TIMESTAMP
```

TABLE USER_RECOVERIES
```
	ID					- UNSIGNED INTEGER		- opt:PAUN
	USER_ID				- opt:FN
	DATE				- TIMESTAMP				- opt:N
	HASH				- VARCHAR(255)			- opt:N
```

## Permissions Block

TABLE PERMISSION_ROLES
```
	ID					- UNSIGNED INTEGER		- opt:PAUN
	USER_ID				- opt:F
	USER_GROUP_ID		- opt:F
	NAME				- VARCHAR(255)			- opt:N
	ADMIN				- BOOL					- opt:ND=0
	VERSION				- INTEGER				- opt:ND=1
```

TABLE PERMISSION_POLICIES
```
	ID					- UNSIGNED INTEGER		- opt:PAUN
	PERMISSION_ROLE_ID	- opt:FN
	MODULE				- VARCHAR(255)			- opt:N
	ACTION				- VARCHAR(255)			- opt:ND=*
```

TABLE PERMISSION_LIMITATIONS
```
	ID					- UNSIGNED INTEGER		- opt:PAUN
	PERMISSION_POLICY_ID- opt:FN
	LIMITATIONS			- TEXT					- opt:N
```

## Workflow Block
* TODO

## Web Store Block
* TODO

# Other ideas
- logging database vs files?
- link users to several objects ( complementing the profile, ... )