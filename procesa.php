<?php

class Procesa{
	//declaramos atributos
	private $_nombre;
	private $_telefono;
	private $_email;
	private $_asunto;
	private $_ejecutivo;
	private $_comentario;
	

	//declaracion de constructor
	public function __construct(){

	}

	public function getNombre(){
		return $this->_nombre;
	}

	public function setNombre($nombre){
		$this->_nombre = $nombre;
	}

	public function getTelefono(){
		return $this->_telefono;
	}

	public function setTelefono($telefono){
		$this->_telefono = $telefono;
	}
	
	public function getEmail(){
		return $this->_email;
	}

	public function setEmail($email){
		$this->_email = $email;
	}

	public function getAsunto(){
		return $this->_asunto;
	}

	public function setAsunto($asunto){
		$this->_asunto = $asunto;
	}

	public function getEjecutivo(){
		return $this->_ejecutivo;
	}

	public function setEjecutivo($ejecutivo){
		$this->_ejecutivo = $ejecutivo;
	}

	public function getComentario(){
		return $this->_comentario;
	}

	public function setComentario($comentario){
		$this->_comentario = $comentario;
	}
	
}