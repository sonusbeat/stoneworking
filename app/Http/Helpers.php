<?php
/**
 * Update status form
 *
 * @param string $resource Example: 'users' or 'categories' or 'articles'
 * @param integer $id
 * @param string $resourceName Example: 'Category' or 'Article'
 * @params boolean $type
 * @return string
 */
function update_status($resource, $id, $resourceName, $type=true)
{
    $form = '<form action="'.route('admin.'.$resource.'.status', $id).'" method="POST">';
    $form .= '<input type="hidden" name="_token" value="'.csrf_token().'">';
    $form .= '<input type="hidden" name="_method" value="PATCH">';
    $form .= '<button class="btn btn-default" data-toggle="tooltip" type="submit"';
    $form .= 'title="';
    $form .= ($type) ? 'Desactivar ' : 'Activar ';
    $form .= $resourceName.'">';
    $form .= '<span class="glyphicon glyphicon-';
    $form .= ($type) ? 'ok text-success' : 'remove text-danger';
    $form .= '"></span>';
    $form .= '</button>';
    $form .= '</form>';

    return $form;
}

/**
 * Eliminar el recurso por id ó index
 *
 * @param  string $resource
 * @param  string|array $params
 * @return Callable
 */
function delete_resource($resource=null, $params=null, $resourceName='')
{
    $form = '<form action='.route('admin.'.$resource.'.destroy', $params).' ';
    $form .= 'method="POST" class="inline" id="delete">';
    $form .= '<input type="hidden" name="_token" value="'.csrf_token().'">';
    $form .= '<input type="hidden" name="_method" value="DELETE">';
    $form .= '<button class="btn btn-danger" type="submit" data-toggle="tooltip"';
    $form .= 'title="Eliminar '.$resourceName.'">';
    $form .= '<span class="glyphicon glyphicon-remove"></span>';
    $form .= "</button>";
    $form .= "</form>";

    return $form;
}

/**
 * Send a flash message
 *
 * @param string $title   The Title of the message
 * @param string $message The content of the message
 * @return mixed
 */
function flash($title = null, $message = null)
{
    $flash = app(Stoneworking\Http\Flash::class);

    return (func_num_args() == 0) ? $flash : $flash->message($title, $message);
}