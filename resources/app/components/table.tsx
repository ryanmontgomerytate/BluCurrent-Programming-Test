import React, { useCallback, useState, FC } from 'react'
import DeleteIcon from '@mui/icons-material/DeleteOutlined'
import { Civilization } from '../types/civilizations'
import { DataGrid, GridActionsCellItem } from '@mui/x-data-grid'
import {
  deleteCivilizationsData,
  updateCivilizationsData,
} from '../fetch/fetchCivilizationsData'

interface Props {
  civData: Civilization[]
  setCivData: (civData: Civilization[]) => void
}

export const Table: FC<Props> = ({ civData, setCivData }) => {
  const handleDelete = (id: string) => {
    deleteCivilizationsData(id)
    setCivData(civData.filter((data) => data.id !== parseInt(id)))
  }
  const [editRowsModel, setEditRowsModel] = useState({})

  const handleEditRowsModelChange = useCallback((model) => {
    setEditRowsModel(model)
  }, [])

  return (
    <div style={{ width: '100%', marginTop: 15 }}>
      <div style={{ height: 400, marginTop: 15 }}>
        <DataGrid
          rows={civData}
          columns={columns(handleDelete)}
          editRowsModel={editRowsModel}
          editMode="row"
          onRowEditStop={(thing) =>
            updateCivilizationsData(thing.row as Civilization)
          }
          onEditRowsModelChange={handleEditRowsModelChange}
        />
      </div>
    </div>
  )
}

const columns = (handleDelete: (id: string) => void) => [
  {
    field: 'id',
    headerName: 'ID',
    type: 'number',
    editable: false,
  },
  {
    field: 'name',
    headerName: 'Name',
    width: 180,
    editable: true,
  },
  {
    field: 'expansion',
    headerName: 'Expansion',
    width: 180,
    editable: true,
  },
  {
    field: 'army_type',
    headerName: 'Army Type',
    width: 180,
    editable: true,
  },
  {
    field: 'team_bonus',
    headerName: 'Team Bonus',
    width: 180,
    editable: true,
  },
  {
    field: 'civilization_bonus',
    headerName: 'Civilization Bonus',
    type: 'array',
    width: 470,
    editable: true,
  },
  {
    field: 'actions',
    type: 'actions',
    headerName: 'Actions',
    width: 100,
    cellClassName: 'actions',
    getActions: ({ id }) => {
      return [
        <GridActionsCellItem
          icon={<DeleteIcon sx={{ color: '#ff0000' }} />}
          label="Delete"
          onClick={() => handleDelete(id)}
          color="inherit"
        />,
      ]
    },
  },
]
