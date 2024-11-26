<?php
include('items/encabezado.php'); // Encabezado común
include('estilos.php'); // Cargar y aplicar los estilos

// Si el formulario es enviado, manejar los cambios
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Actualizar los valores de font y bgColor
    $config['font'] = $_POST['font'] ?? $config['font'];
    $config['bgColor'] = $_POST['bgColor'] ?? $config['bgColor'];

    // Actualizar el nombre de la papelería
    $config['header']['name'] = $_POST['headerName'] ?? $config['header']['name'];

    // Actualizar el color del encabezado
    $config['header']['bgColor'] = $_POST['headerBgColor'] ?? $config['header']['bgColor'];

    // Directorio para subir imágenes
    $uploadDir = __DIR__ . '/uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true); // Crear la carpeta si no existe
    }

    // Manejo de logo (si se sube una nueva imagen)
    if (isset($_FILES['headerLogo']) && $_FILES['headerLogo']['error'] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES['headerLogo']['tmp_name'];
        $fileName = basename($_FILES['headerLogo']['name']);
        $filePath = $uploadDir . $fileName;
        if (move_uploaded_file($tmpName, $filePath)) {
            $config['header']['logo'] = './uploads/' . $fileName;
        }
    }

    // Actualizar textos e imágenes de las secciones
    foreach (['fiesta', 'libretas', 'papeleria', 'utiles'] as $section) {
        $config['sections'][$section]['text'] = $_POST[$section . 'Text'] ?? $config['sections'][$section]['text'];

        if (isset($_FILES[$section . 'Image']) && $_FILES[$section . 'Image']['error'] === UPLOAD_ERR_OK) {
            $tmpName = $_FILES[$section . 'Image']['tmp_name'];
            $fileName = basename($_FILES[$section . 'Image']['name']);
            $filePath = $uploadDir . $fileName;
            if (move_uploaded_file($tmpName, $filePath)) {
                $config['sections'][$section]['image'] = './uploads/' . $fileName;
            }
        }
    }

    // Guardar configuración actualizada en settings.json
    file_put_contents($configFile, json_encode($config));

    // Recargar para evitar reenvíos
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<div class="main">
    <!-- Mostrar el botón de configuración solo si es administrador -->
    <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario'] === 'administrador'): ?>
        <button id="configButton" onclick="toggleModal()">Configuración</button>
    <?php endif; ?>

    <!-- Contenido dinámico del índice -->
    <div class="container">
        <?php foreach ($config['sections'] as $sectionKey => $sectionData): ?>
            <div class="item">
                <a href="<?php echo $sectionKey; ?>.php">
                    <img src="<?php echo $sectionData['image']; ?>" class="<?php echo $sectionKey; ?>" alt="<?php echo $sectionData['text']; ?>">
                </a>
                <p><?php echo $sectionData['text']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Modal de configuración -->
<div id="configModal" style="display: none;">
    <div>
        <h3>Personalización</h3>
        <form method="POST" action="" enctype="multipart/form-data">
            <!-- Configuración del encabezado -->
            <div style="width: 48%;">
                <label for="headerName">Nombre de la Papelería:</label>
                <input type="text" id="headerName" name="headerName" value="<?php echo $config['header']['name']; ?>">
            </div>

            <div style="width: 48%;">
                <label for="headerLogo">Logo (opcional):</label>
                <input type="file" id="headerLogo" name="headerLogo">
            </div>

            <div style="width: 48%;">
                <label for="headerBgColor">Color del encabezado:</label>
                <input type="color" id="headerBgColor" name="headerBgColor" value="<?php echo $config['header']['bgColor']; ?>">
            </div>

            <!-- Configuración de fuente y color -->
            <div style="width: 48%;">
                <label for="font">Tipo de letra:</label>
                <select id="font" name="font">
                    <option value="Arial" <?php if ($config['font'] == 'Arial') echo 'selected'; ?>>Arial</option>
                    <option value="Courier New" <?php if ($config['font'] == 'Courier New') echo 'selected'; ?>>Courier New</option>
                    <option value="Roboto" <?php if ($config['font'] == 'Roboto') echo 'selected'; ?>>Roboto</option>
                </select>
            </div>

            <div style="width: 48%;">
                <label for="bgColor">Color de fondo:</label>
                <input type="color" id="bgColor" name="bgColor" value="<?php echo $config['bgColor']; ?>">
            </div>

            <!-- Configuración de cada sección -->
            <?php foreach ($config['sections'] as $sectionKey => $sectionData): ?>
                <div style="width: 48%;">
                    <h4>Sección <?php echo ucfirst($sectionKey); ?></h4>
                    <label for="<?php echo $sectionKey; ?>Text">Texto:</label>
                    <input type="text" id="<?php echo $sectionKey; ?>Text" name="<?php echo $sectionKey; ?>Text" value="<?php echo $sectionData['text']; ?>">
                </div>

                <div style="width: 48%;">
                    <label for="<?php echo $sectionKey; ?>Image">Imagen:</label>
                    <input type="file" id="<?php echo $sectionKey; ?>Image" name="<?php echo $sectionKey; ?>Image">
                </div>
            <?php endforeach; ?>

            <div style="width: 100%; display: flex; justify-content: space-between;">
                <button type="submit" style="flex: 1; margin-right: 10px;">Guardar</button>
                <button type="button" style="flex: 1;" onclick="toggleModal()">Cerrar</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Mostrar/Ocultar el modal de configuración
    function toggleModal() {
        const modal = document.getElementById('configModal');
        modal.style.display = modal.style.display === 'flex' ? 'none' : 'flex';
    }
</script>

<?php include('items/pie.php'); ?>
