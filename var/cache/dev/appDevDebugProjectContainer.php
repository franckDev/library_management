<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerQrdbpxn\appDevDebugProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerQrdbpxn/appDevDebugProjectContainer.php') {
    touch(__DIR__.'/ContainerQrdbpxn.legacy');

    return;
}

if (!\class_exists(appDevDebugProjectContainer::class, false)) {
    \class_alias(\ContainerQrdbpxn\appDevDebugProjectContainer::class, appDevDebugProjectContainer::class, false);
}

return new \ContainerQrdbpxn\appDevDebugProjectContainer(array(
    'container.build_hash' => 'Qrdbpxn',
    'container.build_id' => '387aad6a',
    'container.build_time' => 1544370999,
), __DIR__.\DIRECTORY_SEPARATOR.'ContainerQrdbpxn');
