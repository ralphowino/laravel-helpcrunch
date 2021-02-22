<?php


namespace Ralphowino\HelpCrunch\Entities;

class Customer extends Base
{
    const SORT_BY_FIRST_SEEN = 'customer.firstSeen';

    const SORT_BY_LAST_SEEN = 'customer.lastSeen';

    public function getAll($sortBy = self::SORT_BY_FIRST_SEEN, int $limit = 100, $offset = 0)
    {
        $response = $this->client->get('/customers', [
            'sort' => $sortBy,
            'limit' => $limit,
            'offset' => $offset,
        ]);
        $this->handleErrors($response);

        return $response->json('data');
    }

    public function search(array $filters, $sortBy = self::SORT_BY_FIRST_SEEN, int $limit = 100, $offset = 0)
    {
        $response = $this->client->post("/customers", [
            'filter' => $filters,
            'sort' => $sortBy,
            'limit' => $limit,
            'offset' => $offset,
        ]);
        $this->handleErrors($response);

        return $response->json();
    }

    public function get(int $id)
    {
        $response = $this->client->get("/customers/$id");

        return $response->json('data');
    }

    public function getByUserId($userId)
    {
        $response = $this->client->post("/customers/search", [
            'filter' => [
                [
                    'field' => 'customers.userId',
                    'operator' => '=',
                    'value' => $userId,
                ],
            ],
            'limit' => 1,
        ]);

        return $response->json('data');
    }

    public function create(array $data)
    {
        $response = $this->client->post("/customers", $data);
        $this->handleErrors($response);

        return $response->json();
    }

    public function update(int $id, array $data)
    {
        $response = $this->client->put("/customers/$id", $data);
        $this->handleErrors($response);

        return $response->json();
    }

    public function batchUpdate($data)
    {
        $response = $this->client->put('/customers/batch', $data);
        $this->handleErrors($response);

        return $response->json();
    }

    public function tag(int $id, array $tags)
    {
        $response = $this->client->put("/customers/$id/tags", compact('tags'));
        $this->handleErrors($response);

        return $response->json();
    }

    public function untag(int $id, array $tags)
    {
        $response = $this->client->delete("/customers/$id/tags", compact('tags'));
        $this->handleErrors($response);

        return $response->json();
    }

    public function delete(int $id)
    {
        $response = $this->client->delete("/customers/$id");
        $this->handleErrors($response);

        return $response->json();
    }

    public function createEvent(int $customer, string $name, array $data)
    {
        $response = $this->client->post("/events", compact('customer', 'name', 'data'));
        $this->handleErrors($response);

        return $response->json();
    }
}
