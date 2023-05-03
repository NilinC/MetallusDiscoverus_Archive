INSERT INTO album (`id`, `title`, `artist`,  `out`, `songs_count`, `duration`, `label`, `songs`)
VALUES
    (1, 'The way of all flesh', 'Gojira', str_to_date('13-10-2008', '%d-%m-%Y'), 12, '01:15:00', 'Listenable Records', JSON_ARRAY()),
    (2, 'Harmatia', 'Tribulation', str_to_date('07-04-2023', '%d-%m-%Y'), 4,  '00:22:02', 'Century Media Records',  JSON_ARRAY()),
    (3, 'Underneath the sound', 'Dropdead Chaos', str_to_date('07-04-2023', '%d-%m-%Y'), 10,  '00:37:41' , 'Sony Music Entertainment',  JSON_ARRAY()),
    (4, 'Dance devil dance', 'Avatar', str_to_date('17-02-2023', '%d-%m-%Y'), 11,  '00:41:16' , 'Black Waltz AB',  JSON_ARRAY()),
    (5, 'Gamechanger', 'Sworn Enemy', str_to_date('05-04-2019', '%d-%m-%Y'), 11,  '00:36:59' , 'Sentric Music',  JSON_ARRAY()),
    (6, 'Oionos', 'Darchon', str_to_date('05-04-2019', '%d-%m-%Y'), 4,  '00:50:02' , 'Mercenary Musik',  JSON_ARRAY()),
    (7, 'Ounas I', 'Suotana', str_to_date('17-03-2023', '%d-%m-%Y'), 6, '00:41:23', 'Reaper Entertainment', JSON_ARRAY()),
    (8, 'Aamunkoi', 'Vorna', str_to_date('21-04-2023', '%d-%m-%Y'), 9, '00:44:08', 'LifeForce Records', JSON_ARRAY()),
    (9, 'Diama', 'Sunbeam overdrive', str_to_date('12-05-2023', '%d-%m-%Y'), 11, '00:00:00', 'Tentacles Industries', JSON_ARRAY()),
    (10, 'Crown', 'For I am King', str_to_date('19-01-2023', '%d-%m-%Y'), 9, '00:36:34', 'Prime Collective', JSON_ARRAY()),
    (11, 'Dreams of land unseen', 'Ignea', str_to_date('28-04-2023', '%d-%m-%Y'), 10, '00:44:51', 'Napalm Records', JSON_ARRAY()),
    (12, 'Terrasite', 'Cattle Decapitation', str_to_date('12-05-2023', '%d-%m-%Y'), 10, '00:52:41', 'Metal Blade', JSON_ARRAY())
;
