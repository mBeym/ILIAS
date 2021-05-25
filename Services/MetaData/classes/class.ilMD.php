<?php
/*
    +-----------------------------------------------------------------------------+
    | ILIAS open source                                                           |
    +-----------------------------------------------------------------------------+
    | Copyright (c) 1998-2001 ILIAS open source, University of Cologne            |
    |                                                                             |
    | This program is free software; you can redistribute it and/or               |
    | modify it under the terms of the GNU General Public License                 |
    | as published by the Free Software Foundation; either version 2              |
    | of the License, or (at your option) any later version.                      |
    |                                                                             |
    | This program is distributed in the hope that it will be useful,             |
    | but WITHOUT ANY WARRANTY; without even the implied warranty of              |
    | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the               |
    | GNU General Public License for more details.                                |
    |                                                                             |
    | You should have received a copy of the GNU General Public License           |
    | along with this program; if not, write to the Free Software                 |
    | Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA. |
    +-----------------------------------------------------------------------------+
*/


/**
* Meta Data class
* always instantiate this class first to set/get single meta data elements
*
* @package ilias-core
* @version $Id$
*/
include_once 'class.ilMDBase.php';

class ilMD extends ilMDBase
{
    /*
     * meta elements
     *
     */
    public function &getGeneral() : bool|ilMDGeneral
    {
        include_once 'Services/MetaData/classes/class.ilMDGeneral.php';

        if ($id = ilMDGeneral::_getId($this->getRBACId(), $this->getObjId())) {
            $gen = new ilMDGeneral();
            $gen->setMetaId($id);
        } else {
            $gen = false;
        }
        return $gen;
    }
    public function &addGeneral() : ilMDGeneral
    {
        include_once 'Services/MetaData/classes/class.ilMDGeneral.php';

        return new ilMDGeneral($this->getRBACId(), $this->getObjId(), $this->getObjType());
    }


    public function &getLifecycle() : bool|ilMDLifecycle
    {
        include_once 'Services/MetaData/classes/class.ilMDLifecycle.php';
        
        if ($id = ilMDLifecycle::_getId($this->getRBACId(), $this->getObjId())) {
            $lif = new ilMDLifecycle();
            $lif->setMetaId($id);
        } else {
            $lif = false;
        }
        return $lif;
    }
    public function &addLifecycle() : ilMDLifecycle
    {
        include_once 'Services/MetaData/classes/class.ilMDLifecycle.php';

        return new ilMDLifecycle($this->getRBACId(), $this->getObjId(), $this->getObjType());
    }

    public function &getMetaMetadata() : ilMDMetaMetadata|bool
    {
        include_once 'Services/MetaData/classes/class.ilMDMetaMetadata.php';

        if ($id = ilMDMetaMetadata::_getId($this->getRBACId(), $this->getObjId())) {
            $met = new ilMDMetaMetadata();
            $met->setMetaId($id);
        } else {
            $met = false;
        }
        return $met;
    }
    public function &addMetaMetadata() : ilMDMetaMetadata
    {
        include_once 'Services/MetaData/classes/class.ilMDMetaMetadata.php';

        return new ilMDMetaMetadata($this->getRBACId(), $this->getObjId(), $this->getObjType());
    }

    public function &getTechnical() : bool|ilMDTechnical
    {
        include_once 'Services/MetaData/classes/class.ilMDTechnical.php';

        if ($id = ilMDTechnical::_getId($this->getRBACId(), $this->getObjId())) {
            $tec = new ilMDTechnical();
            $tec->setMetaId($id);
        } else {
            $tec = false;
        }
        return $tec;
    }
    public function &addTechnical() : ilMDTechnical
    {
        include_once 'Services/MetaData/classes/class.ilMDTechnical.php';

        return new ilMDTechnical($this->getRBACId(), $this->getObjId(), $this->getObjType());
    }

    public function &getEducational() : bool|ilMDEducational
    {
        include_once 'Services/MetaData/classes/class.ilMDEducational.php';

        if ($id = ilMDEducational::_getId($this->getRBACId(), $this->getObjId())) {
            $edu = new ilMDEducational();
            $edu->setMetaId($id);
        } else {
            $edu = false;
        }
        return $edu;
    }
    public function &addEducational() : ilMDEducational
    {
        include_once 'Services/MetaData/classes/class.ilMDEducational.php';

        return new ilMDEducational($this->getRBACId(), $this->getObjId(), $this->getObjType());
    }
    public function &getRights() : bool|ilMDRights
    {
        include_once 'Services/MetaData/classes/class.ilMDRights.php';

        if ($id = ilMDRights::_getId($this->getRBACId(), $this->getObjId())) {
            $rig = new ilMDRights();
            $rig->setMetaId($id);
        } else {
            $rig = false;
        }
        return $rig;
    }
    public function &addRights() : ilMDRights
    {
        include_once 'Services/MetaData/classes/class.ilMDRights.php';

        return new ilMDRights($this->getRBACId(), $this->getObjId(), $this->getObjType());
    }

    public function &getRelationIds() : array
    {
        include_once 'Services/MetaData/classes/class.ilMDRelation.php';

        $ids = ilMDRelation::_getIds($this->getRBACId(), $this->getObjId());
        
        return $ids;
    }
    public function &getRelation($a_relation_id) : bool|ilMDRelation
    {
        include_once 'Services/MetaData/classes/class.ilMDRelation.php';

        if (!$a_relation_id) {
            $rel = false;
        } else {
            $rel = new ilMDRelation();
            $rel->setMetaId($a_relation_id);
        }
        return $rel;
    }
    public function &addRelation() : ilMDRelation
    {
        include_once 'Services/MetaData/classes/class.ilMDRelation.php';

        return new ilMDRelation($this->getRBACId(), $this->getObjId(), $this->getObjType());
    }


    public function &getAnnotationIds() : array
    {
        include_once 'Services/MetaData/classes/class.ilMDAnnotation.php';

        $ids = ilMDAnnotation::_getIds($this->getRBACId(), $this->getObjId());
        return $ids;
    }
    public function &getAnnotation($a_annotation_id) : ilMDAnnotation|bool
    {
        if (!$a_annotation_id) {
            $ann = false;
        } else {
            include_once 'Services/MetaData/classes/class.ilMDAnnotation.php';

            $ann = new ilMDAnnotation();
            $ann->setMetaId($a_annotation_id);
        }


        return $ann;
    }
    public function &addAnnotation() : ilMDAnnotation
    {
        include_once 'Services/MetaData/classes/class.ilMDAnnotation.php';

        return new ilMDAnnotation($this->getRBACId(), $this->getObjId(), $this->getObjType());
    }

    public function &getClassificationIds() : array
    {
        include_once 'Services/MetaData/classes/class.ilMDClassification.php';

        $ids = ilMDClassification::_getIds($this->getRBACId(), $this->getObjId());
        return $ids;
    }
    public function &getClassification($a_classification_id) : bool|ilMDClassification
    {
        if (!$a_classification_id) {
            $cla = false;
        } else {
            include_once 'Services/MetaData/classes/class.ilMDClassification.php';

            $cla = new ilMDClassification();
            $cla->setMetaId($a_classification_id);
        }
        return $cla;
    }
    public function &addClassification() : ilMDClassification
    {
        include_once 'Services/MetaData/classes/class.ilMDClassification.php';

        return new ilMDClassification($this->getRBACId(), $this->getObjId(), $this->getObjType());
    }

    /*
     * XML Export of all meta data
     * @param object (xml writer) see class.ilMD2XML.php
     *
     */
    public function toXML(&$writer)
    {
        $writer->xmlStartTag('MetaData');

        // General
        if (is_object($gen = &$this->getGeneral())) {
            $gen->setExportMode($this->getExportMode());
            $gen->toXML($writer);
        } else {
            // Defaults
            include_once 'Services/MetaData/classes/class.ilMDGeneral.php';
            $gen = new ilMDGeneral($this->getRBACId(), $this->getObjId(), $this->getObjType());	// added type, alex, 31 Oct 2007
            $gen->setExportMode($this->getExportMode());
            $gen->toXML($writer);
        }
            

        // Lifecycle
        if (is_object($lif = &$this->getLifecycle())) {
            $lif->toXML($writer);
        }

        // Meta-Metadata
        if (is_object($met = &$this->getMetaMetadata())) {
            $met->toXML($writer);
        }

        // Technical
        if (is_object($tec = &$this->getTechnical())) {
            $tec->toXML($writer);
        }

        // Educational
        if (is_object($edu = &$this->getEducational())) {
            $edu->toXML($writer);
        }

        // Rights
        if (is_object($rig = &$this->getRights())) {
            $rig->toXML($writer);
        }

        // Relations
        foreach ($this->getRelationIds() as $id) {
            $rel = &$this->getRelation($id);
            $rel->toXML($writer);
        }

        // Annotations
        foreach ($this->getAnnotationIds() as $id) {
            $ann = &$this->getAnnotation($id);
            $ann->toXML($writer);
        }
        
        // Classification
        foreach ($this->getClassificationIds() as $id) {
            $cla = &$this->getClassification($id);
            $cla->toXML($writer);
        }
        
        $writer->xmlEndTag('MetaData');
    }

    /*
     * Clone all meta data of an object
     * @param int rbac_id obj_id of rbac object
     * @param int obj_id obj_id of meta object
     * @param string type of meta object
     * @return object new cloned md object
     *
     */
    public function &cloneMD($a_rbac_id, $a_obj_id, $a_obj_type)
    {
        include_once 'Services/MetaData/classes/class.ilMD2XML.php';

        // this method makes an xml export of the original meta data set
        // and uses this xml string to clone the object
        $md2xml = new ilMD2XML($this->getRBACId(), $this->getObjId(), $this->getObjType());
        $md2xml->startExport();
        
        // Create copier instance. For pg objects one could instantiate a ilMDXMLPageCopier class
        switch ($a_obj_type) {
            default:
                include_once 'Services/MetaData/classes/class.ilMDXMLCopier.php';
                $mdxmlcopier = new ilMDXMLCopier($md2xml->getXML(), $a_rbac_id, $a_obj_id, $a_obj_type);
                break;
        }
        $mdxmlcopier->startParsing();

        return $mdxmlcopier->getMDObject();
    }

    public function deleteAll()
    {
        global $DIC;

        $ilDB = $DIC['ilDB'];
        
        $tables = array('il_meta_annotation',
                        'il_meta_classification',
                        'il_meta_contribute',
                        'il_meta_description',
                        'il_meta_educational',
                        'il_meta_entity',
                        'il_meta_format',
                        'il_meta_general',
                        'il_meta_identifier',
                        'il_meta_identifier_',
                        'il_meta_keyword',
                        'il_meta_language',
                        'il_meta_lifecycle',
                        'il_meta_location',
                        'il_meta_meta_data',
                        'il_meta_relation',
                        'il_meta_requirement',
                        'il_meta_rights',
                        'il_meta_taxon',
                        'il_meta_taxon_path',
                        'il_meta_technical',
                        'il_meta_tar');

        foreach ($tables as $table) {
            $query = "DELETE FROM " . $table . " " .
                "WHERE rbac_id = " . $ilDB->quote($this->getRBACId()) . " " .
                "AND obj_id = " . $ilDB->quote($this->getObjId());

            $this->db->query($query);
        }
        
        return true;
    }
}
