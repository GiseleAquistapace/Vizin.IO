<?php
class PostModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getPostsByPosition($latitude, $longitude) {
        $query = "SELECT p.cd_post, p.latitude, p.longitude, p.nm_local, p.endereco,
                p.assunto, p.descricao, p.dt_update, p.dt_criacao, u.id, u.nome
            FROM post p
            INNER JOIN usuarios u ON u.id = p.cd_usuario
            WHERE p.latitude = $latitude
                AND p.longitude = $longitude
            ORDER BY p.dt_criacao DESC";

        //@TODO you must be asking yourself why I'm not binding the params. It looks like there is no float param type in PDO. Surprise!

        $result = $this->db->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPositions() {
        $query = "SELECT DISTINCT p.latitude, p.longitude
            FROM post p";

        //@TODO Trazer apenas posts do bairro do usuário logado

        $result = $this->db->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertPost($latitude, $longitude, $local, $endereco, $assunto, $descricao, $usuario) {
        $query = "INSERT INTO post (latitude, longitude, nm_local, endereco, assunto, descricao, cd_usuario)
                  VALUES (:latitude, :longitude, :nm_local, :endereco, :assunto, :descricao, :cd_usuario)";

        $statement = $this->db->prepare($query);

        $statement->bindParam(':latitude', $latitude);
        $statement->bindParam(':longitude', $longitude);
        $statement->bindParam(':nm_local', $local);
        $statement->bindParam(':endereco', $endereco);
        $statement->bindParam(':assunto', $assunto);
        $statement->bindParam(':descricao', $descricao);
        $statement->bindParam(':cd_usuario', $usuario);

        return $statement->execute();
    }
}
?>
