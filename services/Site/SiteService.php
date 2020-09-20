<?php

namespace services\Site;

use App\Models\Site;

class SiteService
{
    protected $site;

    public function __construct()
    {
        $this->site = new Site();
    }

    public function get($id)
    {
        return $this->site->find($id);
    }

    public function getAll()
    {
        return $this->site->all();
    }

    public function create($data)
    {
        return $this->site->create($data);
    }

    /**
     * updateSite
     *
     * @param  mixed $site
     * @param  mixed $data
     * @return void
     */
    public function updateSite(Site $site, array $data)
    {
        return $site->update($this->editSite($site, $data));
    }

    /**
     * editSite
     *
     * @param  mixed $site
     * @param  mixed $data
     */
    protected function editSite(Site $site, $data)
    {
        return array_merge($site->toArray(), $data);
    }

    public function deleteSite($id)
    {
        $site = $this->get($id);
        return $site->delete();
    }
}
