<?php
    header('Content-Type: aplication/json');
    require_once("../config/conexion.php");
    require_once("../models/Pedidos.php");
    $pedidos= new Pedidos();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["op"]){

    case "GetPedidos":
        $datos=$pedidos->get_pedidos();
        echo json_encode($datos);
    break;
    
    case "GetUno":
        $datos=$pedidos->get_pedido($body["id"]);
        echo json_encode($datos);
    break;

    case "InsertarPedido":
        $datos=$pedidos->insert_pedido($body["ID_SOCIO"], $body["FECHA_PEDIDO"], $body["DETALLE"], $body["SUB_TOTAL"], $body["TOTAL_ISV"], $body["TOTAL"], $body["FECHA_ENTREGA"], $body["ESTADO"]);
        echo json_encode("Pedido Agregado con Exito!!");
    break;

    case "UpdatePedido":
        $datos=$pedidos->update_pedido($body["ID_SOCIO"],$body["FECHA_PEDIDO"],$body["DETALLE"],$body["SUB_TOTAL"],$body["TOTAL_ISV"],$body["TOTAL"],$body["FECHA_ENTREGA"],$body["ESTADO"],$body["ID"]);
        echo json_encode("Pedido Actualizado con Exito!!");
    break;

    case "deletePedido":
        $datos=$pedidos->delete_pedido($body["id"]);
        echo json_encode("Pedido borrado con Exito!!");
    break;

    case "GetPedidosPendientes":
        $datos=$pedidos->get_pedidosPendientes();
        echo json_encode($datos);
    break;
}
?>