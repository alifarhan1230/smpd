    @echo off
   SET PGPASSWORD=sikp
   echo on
   psql -f E:\schedule_surat_teguran\query_cek_payment_due_date.sql -h 172.16.20.3 -p 5444 -U sikp sikp_db
   