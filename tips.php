<?php
// Incluye el archivo de lógica CRUD de comentarios
require_once './src/database/crud.php';

// Obtener todos los comentarios para mostrarlos
$comments = getComments($conn);

// Variable para almacenar el comentario que se está editando
$comment_to_edit = null;
if (isset($_GET['edit_id'])) {
    $edit_id = intval($_GET['edit_id']); // Asegurar que es un entero
    $comment_to_edit = getCommentById($edit_id, $conn);
}

// Manejo de mensajes de estado después de una operación CRUD
$status_message = '';
$status_type = ''; // 'success' o 'error'
if (isset($_GET['status']) && isset($_GET['message'])) {
    $status_type = $_GET['status'];
    $status_message = htmlspecialchars($_GET['message']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio - Tips y Comentarios</title>
    <link rel="stylesheet" href="./dist/output.css">
    <script src="https://kit.fontawesome.com/af1a09fa4d.js" crossorigin="anonymous"></script>
</head>

<body class="font-montserrat bg-dark-bg text-light-text min-h-screen flex flex-col">

    <header class="fixed top-0 left-0 w-full bg-darker-bg backdrop-blur-md z-50 border-b border-border-color">
        <nav class="flex justify-between items-center px-4 md:px-8 py-4 w-full max-w-7xl mx-auto">
            <div class="flex items-center">
                <span class="text-primary-color text-3xl md:text-4xl font-semibold">BIO</span>
                <span class="text-primary-color text-3xl md:text-4xl font-semibold">DERMA</span>
            </div>
            <ul class="hidden md:flex gap-4 md:gap-8 list-none items-center justify-center p-0 m-0 text-base md:text-xl">
                <li> <a href="index.php#vision" class="text-light-text no-underline px-3 py-2 md:px-5 md:py-2 rounded-md hover:bg-dark-bg hover:text-primary-color transition-all duration-300"> QUIENES SOMOS? </a></li>
                <li> <a href="index.php#productos" class="text-light-text no-underline px-3 py-2 md:px-5 md:py-2 rounded-md hover:bg-dark-bg hover:text-primary-color transition-all duration-300"> PRODUCTOS</a></li>
                <li> <a href="#tips" class="text-light-text no-underline px-3 py-2 md:px-5 md:py-2 rounded-md hover:bg-dark-bg hover:text-primary-color transition-all duration-300"> TIPS </a></li>
            </ul>
        </nav>
    </header>

    <main class="flex-grow pt-24 md:pt-32">
        <section id="tips" class="relative py-16 md:py-24 max-w-5xl mx-auto px-4 sm:px-6 md:px-8">
            <h2 class="section-title text-3xl md:text-4xl font-semibold mb-8 text-center pb-4 relative"> TIPS PARA UN ROSTRO PERFECTO</h2>
            <div class="flex flex-col items-center gap-8 py-4 md:py-8">
                <div class="tips-item relative w-full sm:w-4/5 max-w-xl">
                    <div class="bg-card-bg p-4 rounded-lg border-l-4 border-primary-color ml-8">
                        <span class="inline-block px-3 py-1 bg-darker-bg rounded-md text-sm mb-4">Hidratación</span>
                        <p class="text-sm md:text-base mb-2">Utiliza una crema hidratante adecuada para tu tipo de piel, como una crema para piel seca o un gel para piel grasa.</p>
                        <p class="text-sm md:text-base"> Bebe suficiente agua a lo largo del día para mantener tu piel hidratada. </P>
                    </div>
                </div>
                <div class="tips-item relative w-full sm:w-4/5 max-w-xl">
                    <div class="bg-card-bg p-4 rounded-lg border-l-4 border-primary-color ml-8">
                        <span class="inline-block px-3 py-1 bg-darker-bg rounded-md text-sm mb-4">Protección solar</span>
                        <P class="text-sm md:text-base mb-2">Aplica protector solar todos los días, incluso si está nublado, para proteger tu piel de los daños del sol.</P>
                        <P class="text-sm md:text-base"> Elige un protector solar de amplio espectro con un factor de protección solar (FPS) adecuado para tu tipo de piel.</P>
                    </div>
                </div>
                <div class="tips-item relative w-full sm:w-4/5 max-w-xl">
                    <div class="bg-card-bg p-4 rounded-lg border-l-4 border-primary-color ml-8">
                        <span class="inline-block px-3 py-1 bg-darker-bg rounded-md text-sm mb-4">Limpieza</span>
                        <P class="text-sm md:text-base mb-2">Limpia tu rostro dos veces al día con un limpiador suave para eliminar impurezas y exceso de grasa.</P>
                        <P class="text-sm md:text-base"> Evita el uso de jabones agresivos que puedan irritar tu piel.</P>
                    </div>
                </div>
            </div>
        </section>

        <section id="comentarios" class="py-16 md:py-24 max-w-4xl mx-auto px-4">
            <h2 class="section-title text-3xl md:text-4xl font-semibold mb-8 text-center pb-4 relative">
                DEJA TUS COMENTARIOS
            </h2>

            <?php if ($status_message): ?>
                <div class="p-4 mb-4 rounded-md <?php echo ($status_type === 'success' ? 'bg-green-500' : 'bg-red-500'); ?> text-light-text text-center">
                    <?php echo $status_message; ?>
                </div>
            <?php endif; ?>

            <div class="bg-card-bg p-9 rounded-lg shadow-lg mb-8 ">
                <h3 class="text-2xl font-bold mb-4 text-center">
                    <?php echo ($comment_to_edit ? 'Editar Comentario' : 'Agregar Nuevo Comentario'); ?>
                </h3>
                <form action="tips.php" method="POST" class="space-y-4">
                    <input type="hidden" name="action" value="<?php echo ($comment_to_edit ? 'update' : 'add'); ?>">
                    <?php if ($comment_to_edit): ?>
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($comment_to_edit['id']); ?>">
                    <?php endif; ?>

                    <div>
                        <label for="nombreyapellido" class="block text-light-text text-sm font-bold mb-2">
                            Nombre y Apellido:
                        </label>
                        <input type="text" id="nombreyapellido" name="nombreyapellido" required
                            value="<?php echo htmlspecialchars($comment_to_edit['nombreyapellido'] ?? ''); ?>"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-100 border-gray-300">
                    </div>

                    <div>
                        <label for="usuario" class="block text-light-text text-sm font-bold mb-2">
                            Usuario (Opcional):
                        </label>
                        <input type="text" id="usuario" name="usuario"
                            value="<?php echo htmlspecialchars($comment_to_edit['usuario'] ?? ''); ?>"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-100 border-gray-300">
                    </div>

                    <div>
                        <label for="email" class="block text-light-text text-sm font-bold mb-2">
                            Correo Electrónico:
                        </label>
                        <input type="email" id="email" name="email" required
                            value="<?php echo htmlspecialchars($comment_to_edit['email'] ?? ''); ?>"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-100 border-gray-300">
                    </div>

                    <div>
                        <label for="nota" class="block text-light-text text-sm font-bold mb-2">
                            Nota / Comentario:
                        </label>
                        <textarea id="nota" name="nota" rows="5" required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-100 border-gray-300"><?php echo htmlspecialchars($comment_to_edit['nota'] ?? ''); ?></textarea>
                    </div>

                    <div class="flex items-center justify-center">
                        <button type="submit"
                            class="bg-primary-color hover:bg-darker-bg text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition-all duration-300">
                            <?php echo ($comment_to_edit ? 'Actualizar Comentario' : 'Enviar Comentario'); ?>
                        </button>
                    </div>
                </form>
            </div>

            <h3 class="text-2xl font-bold mb-4 text-center mt-12">Comentarios Recientes</h3>
            <?php if (empty($comments)): ?>
                <p class="text-center text-gray-text">Aún no hay comentarios. ¡Sé el primero en dejar uno!</p>
            <?php else: ?>
                <div class="space-y-6">
                    <?php foreach ($comments as $comment): ?>
                        <div class="bg-card-bg p-6 rounded-lg shadow-md border border-border-color">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <p class="font-bold text-lg text-primary-color"><?php echo htmlspecialchars($comment['nombreyapellido']); ?></p>
                                    <?php if (!empty($comment['usuario'])): ?>
                                        <p class="text-sm text-gray-text">@<?php echo htmlspecialchars($comment['usuario']); ?></p>
                                    <?php endif; ?>
                                    <p class="text-xs text-gray-text mt-1">
                                        Fecha: <?php echo htmlspecialchars($comment['fechanota']); ?>
                                        </p>
                                </div>
                                <div class="flex space-x-2">
                                    <a href="tips.php?edit_id=<?php echo htmlspecialchars($comment['id']); ?>"
                                        class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold py-1 px-3 rounded transition-all duration-300">
                                        Editar
                                    </a>
                                    <form action="tips.php" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este comentario?');">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="delete_id" value="<?php echo htmlspecialchars($comment['id']); ?>">
                                        <button type="submit"
                                            class="bg-red-600 hover:bg-red-700 text-white text-sm font-bold py-1 px-3 rounded transition-all duration-300">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <p class="text-gray-text mt-4 text-base leading-relaxed"><?php echo nl2br(htmlspecialchars($comment['nota'])); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>
    </main>

    <footer class="mt-auto flex flex-col justify-center items-center w-full py-8 bg-darker-bg text-center">
        <div class="flex flex-col items-center">
            <h4 class="text-primary-color text-xl md:text-2xl mb-2"> BIODERMA</h4>
            <h6 class="text-base md:text-xl mb-2"> &copy; Todos los derechos reservados </h6>
            <p class="text-sm md:text-lg text-gray-text"> Este portafolio fue creado como parte de un proyecto académico. </p>
        </div>
    </footer>
</body>
</html>