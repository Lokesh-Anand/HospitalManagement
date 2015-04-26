<?php 

    
    require("common.php"); 
     
    
    if(empty($_SESSION['user'])) 
    { 
        
        header("Location: index.php"); 
         
        
        
        die("Redirecting to index.php"); 
    } 
     
    $query = " 
        SELECT 
            id, 
            username, 
            email 
        FROM users 
    "; 
     
    try 
    { 
        
        $stmt = $db->prepare($query); 
        $stmt->execute(); 
    } 
    catch(PDOException $ex) 
    { 
        
        
        die("Failed to run query: " . $ex->getMessage()); 
    } 
         
    
    $rows = $stmt->fetchAll(); 
?> 
<h1>Memberlist</h1> 
<table> 
    <tr> 
        <th>ID</th> 
        <th>Username</th> 
        <th>E-Mail Address</th> 
    </tr> 
    <?php foreach($rows as $row): ?> 
        <tr> 
            <td><?php echo $row['id']; ?></td> <!-- htmlentities is not needed here because $row['id'] is always an integer --> 
            <td><?php echo htmlentities($row['username'], ENT_QUOTES, 'UTF-8'); ?></td> 
            <td><?php echo htmlentities($row['email'], ENT_QUOTES, 'UTF-8'); ?></td> 
        </tr> 
    <?php endforeach; ?> 
</table> 
<a href="private.php">Go Back</a><br />