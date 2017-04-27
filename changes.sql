-- noinspection SqlNoDataSourceInspectionForFile

-- Schrijf hier de back-end wijzigings queries aan de database.
--
-- Deze wijzigingen worden doorgevoerd bij elke deployment.
-- Na de deployment wijziging word deze file geleegd.

-- FIX FOR #44 [DATABASE]: Rename session db table.
RENAME TABLE ci_sessions TO  sessions_index;
