<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container6zhsovo\appDevDebugProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container6zhsovo/appDevDebugProjectContainer.php') {
    touch(__DIR__.'/Container6zhsovo.legacy');

    return;
}

if (!\class_exists(appDevDebugProjectContainer::class, false)) {
    \class_alias(\Container6zhsovo\appDevDebugProjectContainer::class, appDevDebugProjectContainer::class, false);
}

return new \Container6zhsovo\appDevDebugProjectContainer(array(
    'container.build_hash' => '6zhsovo',
    'container.build_id' => '1d72f8fd',
    'container.build_time' => 1544098817,
), __DIR__.\DIRECTORY_SEPARATOR.'Container6zhsovo');
