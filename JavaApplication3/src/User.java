/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Sathira Nimhana
 */
public class User {
    
    private int pid;
    private String fulname;
    private String depnm;
    private String modnam;
    
    public User(int Id, String Fullnm, String Depnm, String Modnm){
        
        this.pid = Id;
        this.fulname = Fullnm;
        this.depnm = Depnm;
        this.modnam = Modnm;
        
    }
    
    public int getId(){
        return pid;
    } 
    
    public String getFullnm(){
        return fulname;
    } 
    
    public String getDepnm(){
        return depnm;
    } 
    
    public String getModnm(){
        return modnam;
    }
    
}
