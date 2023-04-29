<?php

define('BASE_URL_PATH', 'http://ct271.test/');

// Chuyển hướng đến một trang khác
function redirect($location)
{
    header('Location: ' . BASE_URL_PATH . $location);
    exit();
}

function checkAdminLogin()
{
    if (isset($_SESSION['role']) && $_SESSION['role'] == 0) {
        return true;
    }
    return false;
}


function testPhrase($userInput)
{
    if (isset($_SESSION['phrase']) && $_SESSION['phrase'] === $userInput) {
        return true;
    } else {
        return false;
    }
}

function showMessage($type, $messages)
{
    //default is danger if type not found
    $key = 'danger';

    if ($type == 'success')
        $key = 'success';

    if ($type == 'warning')
        $key = 'warning';

    if ($type == 'error')
        $key = 'danger';

    if ($type == 'info')
        $key = 'primary';

    $html = '<div class="mb-3" >
                <div class="toast show align-items-center text-white bg-' . $key . ' border-0" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body" style="text-align: justify;">' . $messages . '</div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>
            ';

    return $html;
}

function stackMessageWrapper($messages = [])
{
    $html = '<div class="toast-container position-fixed top-0 end-0 p-3" style="z-index:999999">';
    foreach ($messages as $message) {
        $html .= $message;
    }
    $html .= '</div>';
    $html .= '<script>
                $(".toast").each(function(index) {
                    $(this).delay(1500 * (index + 1)).fadeTo(3000, 0, "swing"); 
                });
            </script>';
    return $html;
}
