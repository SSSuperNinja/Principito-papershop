<?php
// Ruta al archivo settings.json
$configFile = __DIR__ . '/../settings.json'; // Ajustamos para estar en cualquier directorio

// Configuración predeterminada si no existe settings.json
$defaultConfig = [
    "font" => "Arial",
    "bgColor" => "#ffffff",
    "sections" => [
        "fiesta" => ["text" => "Artículos de fiesta", "image" => "../Imagenes/fiesta.jpg"],
        "libretas" => ["text" => "Libretas", "image" => "../Imagenes/libretas.jpg"],
        "papeleria" => ["text" => "Papelería", "image" => "../Imagenes/papeleria.jpg"],
        "utiles" => ["text" => "Útiles Escolares", "image" => "../Imagenes/utiles.jpg"]
    ]
];

// Si el archivo no existe, lo creamos con los valores predeterminados
if (!file_exists($configFile)) {
    file_put_contents($configFile, json_encode($defaultConfig));
}

// Cargar configuraciones desde el archivo
$config = json_decode(file_get_contents($configFile), true);

// Verificación si la carga de JSON fue exitosa
if ($config === null) {
    echo "Error al leer el archivo settings.json. Asegúrate de que el archivo esté correctamente formateado.";
    die();
}

// Verificar que la clave 'sections' exista y si no existe, inicializarla
if (!isset($config['sections']) || !is_array($config['sections'])) {
    $config['sections'] = [
        "fiesta" => ["text" => "Artículos de fiesta", "image" => "../Imagenes/fiesta.jpg"],
        "libretas" => ["text" => "Libretas", "image" => "../Imagenes/libretas.jpg"],
        "papeleria" => ["text" => "Papelería", "image" => "../Imagenes/papeleria.jpg"],
        "utiles" => ["text" => "Útiles Escolares", "image" => "../Imagenes/utiles.jpg"]
    ];

    // Guardar configuración actualizada
    file_put_contents($configFile, json_encode($config));
}
?>

<!-- Estilos dinámicos aplicados a la página -->
<style>
    body {
        font-family: <?php echo $config['font']; ?>, sans-serif;
        background-color: <?php echo $config['bgColor']; ?>;
    }
</style>
