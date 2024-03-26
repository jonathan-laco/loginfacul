<?php
require_once 'config.php';

error_reporting(E_ALL);

ini_set('display_errors', 1);

session_start();
if(!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Contagem de usuarios
$count_users_query = "SELECT COUNT(*) as total FROM usuarios";
$count_users_result = $conn->query($count_users_query);
$count_users_row = $count_users_result->fetch_assoc();
$total_users = $count_users_row['total'];

// Lista  users
$users_query = "SELECT nome FROM usuarios";
$users_result = $conn->query($users_query);
$users = array();
while($row = $users_result->fetch_assoc()) {
    $users[] = $row['nome'];
}

//tempo de login
if(isset($_SESSION['login_time'])) {
    $login_time = $_SESSION['login_time'];
    $current_time = time();
    $time_diff = $current_time - $login_time;
    $minutes = floor($time_diff / 60); 
    $seconds = $time_diff % 60; 
    $time_logged_in = sprintf("%02d:%02d", $minutes, $seconds);
} else {
    $time_logged_in = "00:00";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://startbootstrap.github.io/startbootstrap-sb-admin-2/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="assets/css/global.css"> -->
    <link rel="shortcut icon" href="assets/img/icons/favicon.ico" type="image/x-icon">
</head>
<body>
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-text mx-3">Sistema</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="dash.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>

        </ul>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                </nav>

                <div class="container-fluid">


                    <div class="row">

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Usuários Cadastrados</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_users; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Usuário Conectado</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $_SESSION['username']; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card do tempo de login -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tempo de Login</div>
                                            <div id="tempo-login"><?php echo $time_logged_in; ?></div>

                                        </div>
                                        
                                        <div class="col-auto">
                                            <i class="fas fa-clock fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Lista de Usuários</h6>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        <?php foreach($users as $user): ?>
                                            <li class="list-group-item"><?php echo $user; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="text-center">
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script>
    function atualizarTempoLogin() {
        var tempoLoginElement = document.getElementById("tempo-login");
        var tempoLoginInicial = <?php echo isset($_SESSION['login_time']) ? $_SESSION['login_time'] : 0; ?>;
        
        var tempoAtual = Math.floor(Date.now() / 1000); // Tempo atual em segundos
        
        var tempoDecorrido = tempoAtual - tempoLoginInicial;
        var horas = Math.floor(tempoDecorrido / 3600);
        var minutos = Math.floor((tempoDecorrido % 3600) / 60);
        var segundos = tempoDecorrido % 60;
        
        var novoTempoLogin = pad(horas, 2) + ":" + pad(minutos, 2) + ":" + pad(segundos, 2);
        
        tempoLoginElement.innerHTML = novoTempoLogin;
    }
    
    function pad(numero, tamanho) {
        var numeroString = numero.toString();
        while (numeroString.length < tamanho) {
            numeroString = "0" + numeroString;
        }
        return numeroString;
    }
    
    setInterval(atualizarTempoLogin, 1000);
</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/js/sb-admin-2.min.js"></script>
</body>
</html>
<?php
$conn->close();
?>
