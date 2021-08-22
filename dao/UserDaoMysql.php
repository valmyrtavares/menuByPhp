<?php
    require_once 'models/User.php';

class UserDaoMysql implements UserDAO {
private $pdo;

    public function __construct(PDO $driver){
        $this->pdo = $driver;
    }

    public function generateUser($data){
        $u = new User();
        $u->id = $data['id'] ?? 0;
        $u->name = $data['name'] ?? "";
        $u->store = $data['store'] ?? "";
        $u->email = $data['email'] ??"";
        $u->type = $data['type'] ?? "";
        $u->cover = $data['cover'] ?? "";
        $u->password = $data['password'] ??"";
        $u->token = $data['token'] ??"";
        return $u;

    }

    public function findByEmail($email){
        $sql = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $sql->bindValue(':email',$email);
        $sql->execute();
        if($sql->rowCount()>0){            
            $data = $sql->fetch(PDO::FETCH_ASSOC);
            $user = $this->generateUser($data);
            return $user;
        }
      
        return false;
    }

    public function findByToken($token){      
        
        $sql = $this->pdo->prepare("SELECT * FROM users WHERE token = :token");
        $sql->bindValue(':token',$token);
        $sql->execute();
                if($sql->rowCount()>0){
                    $data = $sql->fetch(PDO::FETCH_ASSOC);          
                    $user = $this->generateUser($data);
                    return $user;
                }      
     
        return false;
    }

    public function update(User $u){    
          
      
        $sql = $this->pdo->prepare("UPDATE users SET
        name = :name,
        store = :store,
        email = :email,
        type = :type,
        password = :password,
        cover = :cover,
        token = :token
        WHERE id = :id
        ");
        $sql->bindValue(':name',$u->name);
        $sql->bindValue(':store',$u->store);
        $sql->bindValue(':email',$u->email);
        $sql->bindValue(':type',$u->type);
        $sql->bindValue(':password',$u->password);
        $sql->bindValue(':cover',$u->cover);
        $sql->bindValue(':token',$u->token);
        $sql->bindValue(':id',$u->id);
       
        $sql->execute();
              
        

        return true;
    }

    public function insert(User $u){
        $sql = $this->pdo->prepare("INSERT INTO users 
        (name, email, store, type,cover, password, token) 
        VALUES
        (:name, :email, :store, :type,:cover, :password,:token)");
        $sql->bindValue(':name', $u->name);
        $sql->bindValue(':email', $u->email);
        $sql->bindValue(':store', $u->store);
        $sql->bindValue(':type', $u->type);
        $sql->bindValue(':password', $u->password);
        $sql->bindValue(':cover', $u->cover);
        $sql->bindValue(':token', $u->token);
      
        $sql->execute();
        return true;
    }

}