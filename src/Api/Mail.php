<?php

namespace nickurt\PleskXml\Api;

class Mail extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function create($params)
    {
        return $this->post([
            'mail' => ['create' => ['filter' => $params]]
        ]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function delete($params)
    {
        return $this->post([
            'mail' => ['remove' => ['filter' => $params]]
        ]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function disable($params)
    {
        return $this->post([
            'mail' => ['disable' => $params]
        ]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function enable($params)
    {
        return $this->post([
            'mail' => ['enable' => $params]
        ]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function get($params)
    {
        return $this->post([
            'mail' => ['get_info' => ['filter' => $params, 'mailbox' => [], 'mailbox-usage' => [], 'forwarding' => [], 'aliases' => [], 'autoresponder' => []]]
        ]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function prefs($params)
    {
        return $this->post([
            'mail' => ['get_prefs' => ['filter' => $params]]
        ]);
    }
}
