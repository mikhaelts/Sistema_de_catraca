<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Escolar</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/225cd045e9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="responsive.css">
</head>

<body>
    <style>
        
    </style>

    <main>
        <div class="container-principal">
            <div class="container-secundario">
                <div class="Divisao">
                    <form action="add_user.php" method="post" class="form">
                        <div class="logo">
                            <img src="grupo_alpha.png" alt="Agenda" />

                        </div>
                        
                        <div class="container2">
                            <div class="container-input">
                            <input type="email" class="input-estilo" id="email" name="email" placeholder="Email"
                                    required /> 
                    
                            </div>
                            <div class="container-input">
                                <input type="password" class="input-estilo" id="senha" name="senha" placeholder="Senha"
                                    required />

                            </div>
                            <button type="submit" class="estilo-botao">Logar</button>
                        
                            

                    <?php
                        // Inicie a sessão
                       session_start();

                       // Verifique se a variável de sessão $_SESSION['error_message'] está definida
                       if (isset($_SESSION['error_message'])) {
                       // Exiba a mensagem de erro e limpe a variável de sessão
                       echo "<p style='color: red'>{$_SESSION['error_message']}</p>";
                       unset($_SESSION['error_message']); 
                        }
                    ?>
                          
                            <p class="text">
                                Esqueceu sua senha?
                                <a class="ajuda" href="esqueceusenha.php">Obter ajuda</a>
                            </p>
                           
                           

                        </div>
                    </form>
                </div>
                <div class="container-garoto">
                    <div>
                        <img class="garoto" src="catraca.png" width="380px" alt="" />
                    </div>
                </div>
            </div>
    </main>
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

main {
    overflow: hidden;
    background: linear-gradient(180deg, #ddd 45.31%, #333 100%);
    padding: 2rem;
    display: flex;
    align-items: center;
    justify-content: center;

}

body {

    background: linear-gradient(180deg, #333 45.31%, #ddd 900%);


}

.container-principal {
    position: relative;
    width: 100%;
    max-width: 1020px;
    height: 540px;
    border-radius: 1.3rem;
    box-shadow: 0 60px 40px -30px rgba(0, 0, 0, 0.27);


}

.container-secundario {
    position: absolute;
    width: calc(100% - 4.1rem);
    height: calc(100% - 4.1rem);
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #333;
    border-radius: 20px;


}

.Divisao {
    position: absolute;
    height: 100%;
    width: 45%;
    top: 0;
    left: 0;
    display: grid;
    grid-template-columns: 1fr;
    grid-template-rows: 1fr;
    transition: 0.8s ease-in-out;
    border-radius: 20px 0px 0px 20px;
    background-color: rgb(255, 255, 255);

}

.form {
    max-width: 260px;
    width: 100%;
    margin: 0 auto;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
    grid-column: 1 / 2;
    grid-row: 1 / 2;
    transition: opacity 0.02s 0.4s;


}
h2{
    margin-top: 20px;
}

.logo img {
    width: 207px;
    margin-top: 1rem;

}

.logo {
    display: flex;
    justify-content: center;
    align-items: center;

}

.container-input {
    position: relative;
    height: 37px;
    margin-bottom: 2rem;
    cursor: pointer;



}

.error {
    color: red;
}


.input-estilo {
    position: absolute;
    width: 100%;
    height: 100%;
    background: none;
    border: none;
    outline: none;
    border-bottom: 1px solid #333;
    ;
    padding: 0;
    font-size: 0.95rem;
    color: #151111;
    transition: 0.4s;
    cursor: pointer;
}

.login h2 {
    margin-top: -3rem;
    font-size: 1.6rem;
    font-weight: 600;
    color: #151111;

}

.estilo-botao {
    display: inline-block;
    width: 100%;
    height: 43px;
    background: linear-gradient(180deg, #333 28.7%, #333 100%);
    border-radius: 20px;
    color: #ffffff;
    font-weight: bold;
    border: none;
    cursor: pointer;
    border-radius: 1.0rem;
    font-size: 1rem;
    margin-bottom: 2rem;
    transition: 0.3s;
}

.estilo-botao:hover {
    background-color: #ffffff;
    border-radius: 20px;
    color: #f9f9f9;
}

.container-garoto {
    position: absolute;
    height: 100%;
    width: 54.3%;
    left: 45%;
    top: 0px;
    background: #333;
    border-radius: 0px 30px 30px 0px;
    display: grid;
    grid-template-rows: auto 1fr;
    padding-bottom: 2rem;
    overflow: hidden;
    transition: 0.8s ease-in-out;

}

.garoto {
    margin-top: 20px;
    
}

.ajuda {
    text-decoration: none;
    font-family: Arial, Helvetica, sans-serif;
    font-style: normal;
    font-weight: 600;
    font-size: 1rem;
    line-height: 29px;
    color: #0590B1;


}

.ajuda:hover {
    color: #151111;
}

.user {
    margin-right: 900px;
}

.esqueceu {
    font-size: 15px;
}
</style>
</body>

</html>