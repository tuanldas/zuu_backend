drop table if exists user_profile;
drop table if exists task_comment_photos;
drop table if exists task_comments;
drop table if exists board_columns;
drop table if exists tasks;
drop table if exists boards;
drop table if exists tasks;
drop table if exists users;

drop table if exists users;
create table users
(
    id                bigint unsigned auto_increment primary key,
    uuid              char(30)     not null,
    name              varchar(255),
    email             varchar(255) not null,
    email_verified_at timestamp,
    password          varchar(255) not null,
    remember_token    varchar(100),
    created_at        timestamp    not null,
    updated_at        timestamp    not null
);

drop table if exists password_resets;
create table password_resets
(
    email      varchar(255),
    token      varchar(255),
    created_at timestamp
);

drop table if exists user_profile;
create table user_profile
(
    id          bigint unsigned auto_increment primary key,
    user_id     bigint unsigned not null,
    first_name  varchar(20)    not null,
    last_name   varchar(20)    not null,
    about       text,
    designation varchar(30),
    website     varchar(100),
    phone       varchar(15),
    created_at  timestamp       not null,
    updated_at  timestamp       not null,
    constraint FK_USER_PROFILE_USER foreign key (user_id) references users (id)
);

drop table if exists personal_access_tokens;
create table personal_access_tokens
(
    id             bigint unsigned auto_increment primary key,
    tokenable_type varchar(255)    not null,
    tokenable_id   bigint unsigned not null,
    name           varchar(255)    not null,
    token          varchar(64)     not null,
    abilities      text            null,
    last_used_at   timestamp       null,
    expires_at     timestamp       null,
    grant_type     varchar(10)     not null,
    created_at     timestamp       null,
    updated_at     timestamp       null,
    constraint personal_access_tokens_token_unique unique (token)
);

drop table if exists `projects`;
create table projects
(
    id           bigint unsigned auto_increment primary key,
    uuid         char(30)        not null,
    name         varchar(50)    not null,
    description  varchar(150),
    summary      text,
    icon         varchar(255),
    is_favorites boolean default false,
    owner        bigint unsigned not null,
    status       varchar(10)    not null,
    priority     varchar(10)    not null,
    deleted_at   timestamp,
    created_at   timestamp       not null,
    updated_at   timestamp       not null,
    constraint FK_PROJECTS_USER foreign key (owner) references users (id)
);

drop table if exists boards;
CREATE TABLE boards
(
    id         bigint unsigned auto_increment primary key,
    uuid       char(30)        not null,
    project_id bigint unsigned not null,
    created_at timestamp       not null,
    updated_at timestamp       not null,
    constraint FK_BOARDS_PROJECT FOREIGN KEY (project_id) references projects (id)
);

drop table if exists board_columns;
create table board_columns
(
    id         bigint unsigned auto_increment primary key,
    uuid       char(30)        not null,
    board_id   bigint unsigned not null,
    title      varchar(50)    not null,
    color      varchar(10)    not null,
    created_at timestamp       not null,
    updated_at timestamp       not null,
    constraint FK_BOARDS_COLUMNS FOREIGN KEY (board_id) references boards (id)
);

drop table if exists tasks;
create table tasks
(
    id         bigint unsigned auto_increment primary key,
    uuid       char(30)        not null,
    board_id   bigint unsigned not null,
    column_id  bigint unsigned not null,
    task_id    bigint unsigned,
    title      varchar(150)   not null,
    priority   varchar(10)    not null,
    status     int(2)          not null,
    due_date   timestamp,
    summary    varchar(255),
    created_at timestamp       not null,
    updated_at timestamp       not null,
    constraint FK_TASKS_BOARD FOREIGN KEY (board_id) references boards (id),
    constraint FK_TASKS_COlUMN FOREIGN KEY (column_id) references board_columns (id),
    constraint FK_SUB_TASKS_TASK FOREIGN KEY (task_id) references tasks (id)
);

drop table if exists task_comments;
create table task_comments
(
    id              bigint unsigned auto_increment primary key,
    uuid            char(30)        not null,
    task_id         bigint unsigned not null,
    user_id         bigint unsigned not null,
    task_comment_id bigint unsigned,
    content         varchar(255)   not null,
    created_at      timestamp       not null,
    updated_at      timestamp       not null,
    constraint FK_TASK_COMMENT_TASK foreign key (task_id) references tasks (id),
    constraint FK_TASK_COMMENT foreign key (user_id) references users (id),
    constraint FK_TASK_COMMENT_REPLY foreign key (task_comment_id) references task_comments (id)
);

drop table if exists task_comment_photos;
create table task_comment_photos
(
    id              bigint unsigned auto_increment primary key,
    uuid            char(30)      not null,
    task_comment_id bigint unsigned,
    path            varchar(255) not null,
    created_at      timestamp     not null,
    updated_at      timestamp     not null,
    constraint FK_TASK_COMMENT_PHOTO foreign key (task_comment_id) references task_comments (id)
);

drop table if exists task_history;
create table task_history
(
    id         bigint unsigned auto_increment primary key,
    user_id    bigint unsigned not null,
    duration   int             not null,
    message    varchar(250)   not null,
    created_at timestamp       not null,
    updated_at timestamp       not null,
    constraint FK_TASK_HISTORY_USER foreign key (user_id) references users (id)
);
