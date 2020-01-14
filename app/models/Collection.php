<?php


namespace app\models;


class Collection extends AppModel
{

    public $id;
    public $title;
    public $description;
    public $main_image;
    public $created_at;
    public $updated_at;


    // return latest collection
    public function getLatestCollection()
    {
        $latestCollection = $this->find([
            'order' => '`created_at` DESC',
            'limit' => 1
        ]);
        return $latestCollection[0];
    }


    // return 2 latest collections
    public function getLatestCollections()
    {
        $latestCollections = $this->find([
            'order' => '`created_at` ASC',
            'limit' => 2
        ]);
        $latestCollectionsWithImages = [];
        foreach ($latestCollections as $latestCollection) {
            $latestCollection->images = $this->getImagesForCollection($latestCollection->id);
            $latestCollectionsWithImages[] = $latestCollection;
        }

        return $latestCollectionsWithImages;
    }

    public function getImagesForCollection($id)
    {
        $query = 'SELECT images_collections.image FROM collections LEFT JOIN images_collections ON collections.id = images_collections.collection_id WHERE collections.id = :id';
        $givenImages = $this->db->prepare($query);
        $givenImages->bindParam(':id', $id);
        $givenImages->execute();
        $givenImages->setFetchMode(\PDO::FETCH_ASSOC);

        $images = [];

        foreach ($givenImages->fetchAll() as $image) {
            $images[] = $image['image'];
        }
        return $images;
    }

}