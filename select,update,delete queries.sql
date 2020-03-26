--Muhammad Luqman
--G00353385
Show databases;

Use project;

-- Queries
select patno,title,patientname,doctor from patient;

update appointment set appointmentdate = '2020-05-25' where patno = 7369;

delete from patient where patientname = 'Peter';

