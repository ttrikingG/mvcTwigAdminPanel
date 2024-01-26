<?php

$this->functions[] = $this->functionsToView('message', function($key, $type = 'danger') {
    return (new \app\classes\Flash)->get($key, $type);
});

