/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Sathira Nimhana
 */
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.ResultSet;

public class db {
    
    //private static final String USERNAME = "root";
    //private static final String PASSWORD = "root";
    //private static final String CONN_CONN = "jdbc:mysql://localhost:3306/Project";
    
   
        
        static private Connection c;
        
        public static Connection getCon() throws Exception{
            
            if(c == null){
                
                Class.forName("com.mysql.cj.jdbc.Driver");
                
                c = DriverManager.getConnection("jdbc:mysql://localhost:3306/prathz?useSSL=false", "root", "root");
                
            }
            
            return c;
            
        }
        
    

    public static void setData(String s) throws Exception{
        db.getCon().createStatement().executeUpdate(s);
    }
    
    public static ResultSet getData(String sq) throws Exception{
        return db.getCon().createStatement().executeQuery(sq);
    }
    
}
