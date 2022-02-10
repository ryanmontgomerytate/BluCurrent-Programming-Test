import * as React from 'react'
import Box from '@mui/material/Box'
import Button from '@mui/material/Button'
import AddIcon from '@mui/icons-material/Add'
import EditIcon from '@mui/icons-material/Edit'
import DeleteIcon from '@mui/icons-material/DeleteOutlined'
import SaveIcon from '@mui/icons-material/Save'
import CancelIcon from '@mui/icons-material/Close'
import { Civilization } from '../types/civilizations'
import { DataGrid, GridActionsCellItem, useGridApiRef } from '@mui/x-data-grid'
import { Alert } from '@mui/material'
import { DataGridPro } from '@mui/x-data-grid-pro'
import { deleteCivilizationsData } from '../fetch/fetchCivilizationsData'

interface Props {
  civData: Civilization[]
  setCivData: (civData: Civilization[]) => void
}

export const Table: React.FC<Props> = ({ civData, setCivData }) => {
  const handleDelete = (id: string) => {
    deleteCivilizationsData(id)
    setCivData(civData.filter((data) => data.id !== parseInt(id)))
  }

  const columns = [
    { field: 'id', headerName: 'ID', type: 'number', editable: false },
    { field: 'name', headerName: 'Name', width: 180, editable: true },
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
      field: 'civilization_bonus_0',
      headerName: 'Civilization Bonus',
      width: 180,
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
            icon={<DeleteIcon />}
            label="Delete"
            onClick={() => handleDelete(id)}
            color="inherit"
          />,
        ]
      },
    },
  ]
  const [editRowsModel, setEditRowsModel] = React.useState({})

  const handleEditRowsModelChange = React.useCallback((model) => {
    setEditRowsModel(model)
  }, [])

  return (
    <div style={{ width: '100%' }}>
      <div style={{ height: 400, width: '100%' }}>
        <DataGrid
          rows={civData}
          columns={columns}
          editRowsModel={editRowsModel}
          editMode="row"
          onEditRowsModelChange={handleEditRowsModelChange}
        />
      </div>
      <Alert severity="info" style={{ marginTop: 8 }}>
        <code>editRowsModel: {JSON.stringify(editRowsModel)}</code>
      </Alert>
    </div>
  )
}
