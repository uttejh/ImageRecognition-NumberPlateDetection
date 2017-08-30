import MySQLdb
conn = MySQLdb.connect (host = "localhost",
                           user = "testuser",
                           passwd = "testpass",
                           db = "test")
cursor = conn.cursor ()
cursor.execute ("SELECT VERSION()")
row = cursor.fetchone ()
print "server version:", row[0]
cursor.close ()
conn.close ()
